#!/usr/bin/env php
<?php declare(strict_types=1);

namespace VCache;

final class Str
{
    public static function str($string): string
    {
        return is_string($string)
            ? $string
            : self::try_stringable($string) ?? self::throw_invalid($string);
    }

    public static function int($any): int
    {
        return is_string($any)
            ? (int) $any
            : self::try_countable($any) ?? self::throw_invalid($any, 'integer required');
    }

    /**
     * @param mixed $subject
     * @return mixed|never
     */
    public static function throw_invalid($subject, $reason = 'string required')
    {
        throw new \InvalidArgumentException($reason);
    }

    public static function try_countable($objectOrArray): ?int
    {
        if (is_array($objectOrArray)) {
            return count($objectOrArray);
        }

        if (!$objectOrArray instanceof \Countable) {
            return null;
        }

        try {
            $buffer = (int) $objectOrArray->count();
        } catch (\Exception $e) {
            throw new \RuntimeException('exception on count() call: ' . get_class($objectOrArray), 0, $e);
        }

        return $buffer;
    }

    /**
     * @param mixed $object
     * @return string|null
     */
    public static function try_stringable($object): ?string
    {
        if (!is_object($object)) {
            return null;
        }

        if (!method_exists($object, '__toString')) {
            return null;
        }

        try {
            $buffer = (string) $object->__toString();
        } catch (\Exception $e) {
            throw new \RuntimeException('exception on __toString() call on: ' . get_class($string), 0, $e);
        }

        return $buffer;
    }

    public static function partition(string $str, string $sep): array
    {
        if (false === $p = strpos($str, $sep)) {
            return [$str, '', ''];
        }
        return [substr($str, 0, $p), $sep, (string) substr($str, $p + strlen($sep))];
    }

    public static function partspn(string $str, string $chars): array
    {
        $a = strcspn($str, $chars);
        $b = strspn($str, $chars, $a);
        if (0 === $b) {
            return [$str, '', ''];
        }
        return [substr($str, 0, $a), substr($str, $a, $b), substr($str, $a + $b)];
    }

    public static function partcspn(string $str, string $chars): array
    {
        $a = strspn($str, $chars);
        $b = strcspn($str, $chars, $a);
        if (0 === $b) {
            return [$str, '', ''];
        }
        return [substr($str, 0, $a), substr($str, $a, $b), substr($str, $a + $b)];
    }

    /**
     * in many cases a (binary) string containing the NUL character is not acceptable (e.g. it is uses as record
     * terminator for variable length strings in C, environ, pathname and the like. many computing libraries with
     * C bindings for example are prone to NUL byte injection.
     *
     * NUL bytes can be easily refuted and often such a check can be lax as well by cutting away trailing NUL
     * bytes _for the value in question_.
     *
     * additionally guard against empty strings to prevent empty string injections if wanted.
     *
     * @param string $str
     * @param bool $allowEmpty
     * @param bool $rtrim
     * @return string
     */
    public static function gate_nulstr(string $str, bool $allowEmpty = false, bool $rtrim = true): string
    {
        $buf = $rtrim ? rtrim($str, "\0") : $str;
        if (false === $allowEmpty && '' === $buf) {
            throw new \InvalidArgumentException('empty binary string encountered');
        }

        if (false !== strpos($buf, "\0")) {
            throw new \InvalidArgumentException('non-terminal NUL byte in binary string "' . addcslashes($buf, "\0..\37\42\134\177..\377") . '"');
        }

        return $buf;
    }

    public static function file($path): string
    {
        $buffer = file_get_contents((string) Path::path($path));
        if (false === $buffer) {
            throw new \RuntimeException('Fatal reading file: ' . var_export((string) $path, true));
        }
        return $buffer;
    }
}

/**
 * Version 7 + POSIX.1-2017, trailing slashes are removed, there is no process / environment, this is a utility
 * class, trailing slashes are not preserved, parent of root is root, any resolution is done logically and not
 * against the filesystem nor process state like current working directory. The implementation specific first component
 * might get lost in normalization, that the path itself is implementation specific not.
 */
final class PosixPath
{
    /**
     * @var string|null
     */
    private $anchor;

    /**
     * @var string
     */
    private $parts;

    public function __construct(string $path)
    {
        [$this->anchor, $this->parts] = $this->partsOf(Str::gate_nulstr($path));
    }

    public function parts(): array
    {
        $parts = [];
        null === $this->anchor || $parts[] = $this->anchor;
        return empty($this->parts) ? $parts : array_merge($parts, $this->parts);
    }

    /**
     * @param string $path
     * @return array{?string,list<string>}
     */
    private function partsOf(string $path): array
    {
        $anchor = null;
        $parts = [];
        while ($path !== '') {
            if (0 !== $l = strcspn($path, '/')) {
                $part = substr($path, 0, $l);
                $part === '.' || $parts[] = $part;
                $path = (string) substr($path, $l);
            }
            if (0 !== $l = strspn($path, '/')) {
                $parts ?: ($anchor = $l === 2 ? '//' : '/');
                $path = (string) substr($path, $l);
            }
        }
        return [$anchor, $parts];
    }

    public function isAbsolute(): bool
    {
        return null !== $this->anchor;
    }

    public function asPosix(): string
    {
        $buffer = (string) $this->anchor;
        $parts = $this->parts;
        $l = count($parts);
        foreach ($parts as $i => $part) {
            $buffer .= $part . (($i + 1 !== $l) ? Path::DIR_SEP : '');
        }
        return '' === $buffer ? Path::DIR_SELF : $buffer;
    }

    public function normalize(): PosixPath
    {
        $buffer = [];
        $prefixes = [];
        $parts = $this->parts;
        $anchor = $this->anchor;

        foreach ($parts as $part) {
            if (Path::DIR_UP === $part) {
                if (!empty($buffer)) {
                    array_pop($buffer);
                } elseif (null === $anchor) {
                    $prefixes[] = $part;
                }
                continue;
            }
            $buffer[] = $part;
        }

        return new PosixPath($anchor . implode(Path::DIR_SEP, array_merge($prefixes, $buffer)));
    }

    public function isResolved(): bool
    {
        return !$this->isAbsolute() || !$this->hasSegment(Path::DIR_UP);
    }

    public function hasSegment(string $segment): bool
    {
        return in_array($segment, $this->parts, true);
    }

    public function within(PosixPath $home): bool
    {
        $parts = $this->parts;
        foreach ($home->parts as $index => $part) {
            if ($parts[$index] !== $part) {
                return false;
            }
        }

        if (!isset($index)) {
            throw new \InvalidArgumentException('Path of $HOME is empty');
        }

        return isset($parts[1 + $index]);
    }

    public function join($path): PosixPath
    {
        $path = Path::path($path);
        return $path->isAbsolute() ? $path : Path::posix("$this//$path");
    }

    public function __toString(): string
    {
        return $this->asPosix();
    }

    public function isBasename(): bool
    {
        return null === $this->anchor && 1 === count($this->parts);
    }
}

final class Path
{
    public const DIR_SEP = '/';
    public const DIR_SELF = '.';
    public const DIR_UP = '..';

    /**
     * @param PosixPath|string| $path
     * @return PosixPath
     */
    public static function path($path): PosixPath
    {
        $buffer = $path;

        if ($buffer instanceof PosixPath) {
            return self::posix($buffer->asPosix());
        }

        try {
            return self::posix($path);
        } catch (\InvalidArgumentException $invalidArgumentException) {
            throw new \InvalidArgumentException('invalid path: ' . var_export($path, true), 0, $invalidArgumentException);
        }
    }

    public static function posix($path): PosixPath
    {
        return new PosixPath(Str::gate_nulstr(Str::str($path)));
    }
}

final class Env
{
    public static function env($in = null): array
    {
        $out = [];
        if (null === $in) {
            $out = $_SERVER;
        }

        return $out;
    }
}

final class Config
{
    /**
     * @var string
     */
    private $directory;
    /**
     * @var string
     */
    private $file;

    public const COMPOSER_NAME = 'COMPOSER';
    public const COMPOSER = 'composer.json';
    public const LOCK = '.lock';
    public const NO_CONTENT_HASH = 'd41d8cd98f00b204e9800998ecf8427e';

    public static function create(string $directory, string $file = null, array $env = null): Config
    {
        $env = Env::env($env);
        null === $file && $file = trim((string) @$env[self::COMPOSER_NAME]) ?: self::COMPOSER;
        $filePath = Path::path($file);
        if (!$filePath->isBasename()) {
            throw new \InvalidArgumentException('File must be a basename only, it operates on a directory: ' . var_export($file, true));
        }

        if (empty($env['HOME']) || !is_dir($env['HOME'])) {
            throw new \RuntimeException('Cowardly refusing $HOME parameter which is unset, empty or not a directory: ' . var_export($env['HOME'] ?? null, true));
        }
        $home = Path::posix($env['HOME']);
        if (!$home->isResolved()) {
            throw new \RuntimeException('Cowardly refusing $HOME parameter is relative or contains such path segments: ' . var_export($env['HOME'], true));
        }
        if (empty($directory) || !is_dir($directory)) {
            throw new \RuntimeException('Not a directory: ' . var_export($directory, true));
        }
        $dir = Path::posix($directory)->normalize();
        if (!$dir->within($home)) {
            throw new \InvalidArgumentException('Directory not $HOME or beneath: ' . var_export($directory, true));
        }

        return new Config($dir->asPosix(), (string)$filePath, $env);
    }

    public function __construct(string $directory, string $fileName, array $env)
    {
        // canMountJson
        // hasLock *throws* if !canMountJson

        $this->directory = $directory;
        $this->file = $fileName;
    }

    public function getHash(): string
    {
        return md5(Str::file($this->getComposerJsonFilePath()));
    }

    public function tryLockContentHash(): ?string
    {
        $lock = $this->tryComposerLockFilePath();
        if (null === $lock) {
            return null;
        }
        $content = $this->jsonDecodeFile($lock);
        $contentHash = $content['content-hash'] ?? '';

        return str_pad($contentHash, strlen(self::NO_CONTENT_HASH), 'x');
    }

    public function tryContentHash(): ?string
    {
        try {
            return $this->getContentHash();
        } catch (\RuntimeException $e) {
            return null;
        }
    }

    public function getContentHash(): string
    {
        $content = $this->jsonDecodeFile($this->getComposerJsonFilePath());

        $relevantKeys = [
            'name',
            'version',
            'require',
            'require-dev',
            'conflict',
            'replace',
            'provide',
            'minimum-stability',
            'prefer-stable',
            'repositories',
            'extra',
        ];

        $relevantContent = [];

        foreach (array_intersect($relevantKeys, array_keys($content)) as $key) {
            $relevantContent[$key] = $content[$key];
        }
        if (isset($content['config']['platform'])) {
            $relevantContent['config']['platform'] = $content['config']['platform'];
        }

        ksort($relevantContent);

        return md5($this->jsonEncode($relevantContent, 0));
    }

    /**
     * @return PosixPath of the directory of the composer project
     */
    public function getComposerProjectDirectory(): PosixPath
    {
        $dir = Path::posix($this->directory);
        if (!is_dir((string) $dir)) {
            throw new \BadMethodCallException('Composer project not a directory: ' . var_export((string) $dir, true));
        }

        return $dir;
    }

    public function getComposerJsonFileName(): string
    {
        return $this->file;
    }

    public function getComposerJsonFilePathname(): string
    {
        return (string) Path::path($this->directory)->join($this->file);
    }

    /**
     * @return string|null if the file does not exist
     */
    public function tryComposerJsonFilePath(): ?string
    {
        $file = $this->getComposerProjectDirectory()->join($this->file)->asPosix();

        return is_file($file) ? $file : null;
    }

    public function getComposerJsonFilePath(): string
    {
        $file = $this->getComposerProjectDirectory()->join($this->file)->asPosix();
        if (!is_file($file)) {
            throw new \BadMethodCallException('Composer json configuration not a file: ' . var_export($file, true));
        }

        return $file;
    }

    public function tryComposerLockFilePath(): ?string
    {
        $path = (string) $this->getComposerProjectDirectory()->join($this->getComposerLockFileName());
        return is_file($path) ? $path : null;
    }

    public function getComposerLockFilePathname(): string
    {
        return (string) Path::path($this->directory)->join($this->getComposerLockFileName());
    }

    public function getComposerLockFileName(string $file = null): string
    {
        null === $file && $file = $this->file;
        $file = Str::gate_nulstr($file);
        return ($match = pathinfo(self::COMPOSER, PATHINFO_EXTENSION)) === pathinfo($file, PATHINFO_EXTENSION)
            ? substr($file, 0, -strlen($match)) . substr(self::LOCK, -strlen($match))
            : $file . self::LOCK;
    }

    /* JSON routines */

    private const JSON_ERRORS = [
        JSON_ERROR_NONE => 'No error',
        JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Underflow or the modes mismatch',
        JSON_ERROR_CTRL_CHAR => 'Unexpected control character found',
        JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded',
    ];

    /**
     * @return string JSON text
     */
    private function jsonEncode($data, int $options = 448): string
    {
        $json = json_encode($data, $options);
        if (false === $json) {
            $msg = self::JSON_ERRORS[json_last_error()] ?? 'Unknown error';
            throw new \RuntimeException('JSON encoding failed: ' . $msg);
        }

        return $json;
    }

    /**
     * @return mixed
     */
    private function jsonDecodeFile($path)
    {
        $buffer = Str::file($path);
        $result = json_decode($buffer, true);
        if (null === $result && $error = json_last_error()) {
            $msg = self::JSON_ERRORS[$error] ?? 'Unknown error';
            throw new \RuntimeException(sprintf("JSON decoding from file %s failed: %s", var_export((string) $path, true), $msg));
        }

        return $result;
    }
}

final class Cache
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var string
     */
    private $configLockCacheDir;

    /**
     * @var string
     */
    private $directory;
    /**
     * @var int
     */
    private $levels;

    private $prefixes = ['config', 'lock-compare'];

    public function __construct(string $directory, int $levels)
    {
        $this->directory = Path::path($directory)->asPosix();
        $this->levels = $levels;
    }

    public function init(Config $config): void
    {
        $this->config = $config;
        $this->setConfigLockCacheDir($this->mkdir($this->directory . '//cache/config-lock'));
    }

    public function getConfigLockCacheDir(): string
    {
        return $this->configLockCacheDir;
    }

    private function setConfigLockCacheDir(string $path): void
    {
        $this->configLockCacheDir = $path;
    }

    public function getConfigLockCacheFilePath(string $configHash): string
    {
        return $this->configLockCacheDir . '//' . $configHash . '.' . $this->config->getComposerLockFileName();
    }

    public function tryConfigLockCacheFile(string $configHash): ?string
    {
        $configLockCacheFile = $this->getConfigLockCacheFilePath($configHash);
        $hasLockCache = is_file($configLockCacheFile);
        return $hasLockCache ? $configLockCacheFile : null;
    }

    private function mkdir(string $path): string
    {
        if (!is_dir($path) && !mkdir($path, 0700, true) && !is_dir($path)) {
            throw new \RuntimeException('failed to create directory: ' . var_export($path, true));
        }

        $ignoreFile = $path . '/.gitignore';
        if (!is_file($ignoreFile)) {
            file_put_contents($ignoreFile, "# composer config-lock cache directory\n/*\n");
        }

        return $path;
    }

    public function getProjectPathname(): string
    {
        return dirname($this->directory, $this->levels);
    }

    public function main(array $argv): void
    {
        $args = array_flip(array_slice($argv, 1));

        if (isset($args['-h']) || isset($args['--help'])) {
            echo <<<'USAGE'
usage: .config/composer/vcache.php [ --clean | --remove-lock-cache-file
                                     [-n|--dry-run] [-v] ]

    -h, --help            show usage instructions

Remove options
    --remove-lock-cache-file
                          remove the lock cache file
    --clean               clean the cache
    -n, --dry-run         do not remove the lock cache file
    -v                    show more information on stderr

Example

    touch the lock cache and install, installs new if composer content hash
    does not match:

        .config/composer/vcache.php


USAGE;
            exit(0);
        }

        $verbose = false;
        if (isset($args['-v'])) {
            $verbose = true;
            unset($args['-v']);
        }

        if (!count($args)) {
            return; // remain silent
        }

        $verbose && fprintf(STDERR, "project: \"%s\"\n", addcslashes($this->getProjectPathname(), "\0..\37\\\"\177..\377"));

        $config = $this->config;
        $configFile = $config->tryComposerJsonFilePath();
        $configHash = null;
        if (null === $configFile) {
            $verbose && fprintf(STDERR, "operating config: %s\n", 'none');
        } else {
            $verbose && fprintf(STDERR, "operating config: \"%s\"\n", addcslashes($configFile, "\0..\37\\\"\177..\377"));
            $configHash = $this->fileHash('config', $configFile);
            $verbose && fprintf(STDERR, "config hash: \"%s\"\n", addcslashes($configHash, "\0..\37\\\"\177..\377"));
        }

        $lockFile = $config->tryComposerLockFilePath();
        if (null === $lockFile) {
            $verbose && fprintf(STDERR, "operating lock: %s\n", 'none');
        } else {
            $verbose && fprintf(STDERR, "operating lock: \"%s\"\n", addcslashes($lockFile, "\0..\37\\\"\177..\377"));
            $verbose && fprintf(STDERR, "lock hash: \"%s\"\n", addcslashes($configHash, "\0..\37\\\"\177..\377"));
            if (($ch = $config->tryContentHash()) !== $lh = $config->tryLockContentHash()) {
                printf("config and lock content-hash diverge: %s vs. %s.\n", $ch ?? 'none', $lh ?? 'none');
            }
            $configLockCacheFile = $this->getConfigLockCacheFilePath($configHash);
            $hasLockCache = is_file($configLockCacheFile);
            fprintf(STDERR, "operating lock cache: \"%s\"\n", addcslashes($configLockCacheFile, "\0..\37\\\"\177..\377"));
            $yesNo = [
                'no',
                sprintf(
                    'yes (size=%s age=%ds mtime=%s)',
                    $hasLockCache ? number_format(filesize($configLockCacheFile), 0, '', '_') : 0,
                    $hasLockCache ? 0 + $_SERVER['REQUEST_TIME'] - ($fileMTime = filemtime($configLockCacheFile)) : 0,
                    $hasLockCache ? gmdate('Y-m-d\TH:i:s\Z', $fileMTime) : 0
                ),
            ];
            fprintf(STDERR, "operating lock cache exists: %s\n", $yesNo[$hasLockCache]);
            if (isset($args['--remove-lock-cache-file'], $configLockCacheFile)) {
                if (isset($args['-n']) || isset($args['--dry-run'])) {
                    fprintf(STDERR, "dry-run: would remove operating lock cache file\n");
                } else {
                    fprintf(STDERR, "removing lock cache file: \"%s\"\n", addcslashes($configLockCacheFile, "\0..\37\\\"\177..\377"));
                    \unlink($configLockCacheFile);
                }
            }

            if (isset($args['--clean'])) {
                $cacheDir = $this->getConfigLockCacheDir();
                $cachedLockFiles = glob($cacheDir . '/config-*.lock', GLOB_NOSORT);
                if (isset($args['-n']) || isset($args['--dry-run'])) {
                    fprintf(STDERR, "dry-run: would clean cache: \"%s\"\n", addcslashes($cacheDir, "\0..\37\\\"\177..\377"));
                    foreach ($cachedLockFiles as $cachedLockFile) {
                        fprintf(STDERR, "  would remove: \"%s\"\n", addcslashes($cachedLockFile, "\0..\37\\\"\177..\377"));
                    }
                } else {
                    fprintf(STDERR, "cleaning cache: \"%s\"\n", addcslashes($cacheDir, "\0..\37\\\"\177..\377"));
                    foreach ($cachedLockFiles as $cachedLockFile) {
                        fprintf(STDERR, "removing lock cache file: \"%s\"\n", addcslashes($cachedLockFile, "\0..\37\\\"\177..\377"));
                        \unlink($cachedLockFile);
                    }
                }
            }
        }
    }

    /**
     *
     * caches lockfile under hash(config)
     *
     * dead simple initial approach:
     * - if composer.lock is missing, restore from cache if cache has it.
     * - if exists, and not in cache, run composer update to freshen it and then store it in cache.
     *
     * the use composer install instead of composer update
     *
     * alternatively to hashing the file our own, composers content-hash could be re-used:
     *
     * - if composer.lock is missing, restore from cache if cache has it.
     * - if composer.lock exists, create content-hash of config and check against lock:
     *   - if it matches, store in cache
     *   - if not, check cache for content-hash
     *       - if it exists in store, restore from cache
     *       - if not remove the projects lockfile so that composer can update on install
     *
     * this alternative method has the benefit of not needing to invoke composer
     *
     * @return void
     */
    public function touchLock(): void
    {
        $config = $this->config;

        $configFile = $config->tryComposerJsonFilePath();
        if (null === $configFile) {
            return;
        }

        $configHash = $this->fileHash('config', $configFile);

        $lockFile = $config->getComposerLockFilePathname();
        $lockExists = is_file($lockFile);

        if (($ch = $config->getContentHash()) !== $lh = $config->tryLockContentHash()) {
            printf("config and lock content-hash diverge: %s vs. %s.\n", $ch, $lh);
        }

        $lockRestoredFromCache = false;
        $configLockCacheFile = $this->getConfigLockCacheFilePath($configHash);
        $hasLockCache = is_file($configLockCacheFile);
        if (!$lockExists) {
            if ($hasLockCache) {
                touch($configLockCacheFile);
                $result = copy($configLockCacheFile, $lockFile);
                if (false === $result) {
                    throw new \RuntimeException('failed to restore composer.lock from cache: ' . var_export($configLockCacheFile, true));
                }
                $lockRestoredFromCache = true;
            }
        } else {
            if (!$hasLockCache) {
                // run composer update
                $oldCwd = getcwd();
                if (!chdir($prj = $this->getProjectPathname())) {
                    throw new \RuntimeException('failed to change into project directory to run composer update: ' . var_export($prj, true));
                }
                passthru('composer --no-plugins -q update --no-scripts --no-progress', $status);
                if (0 !== $status) {
                    throw new \RuntimeException('composer exited with a non-zero status code: ' . var_export($status, true));
                }
                if (!chdir($oldCwd) && getcwd() !== $oldCwd) {
                    throw new \RuntimeException('failed to change back to old directory: ' . var_export($oldCwd, true));
                }
                $afterUpdateConfigHash = $this->fileHash('config', $configFile);
                if ($afterUpdateConfigHash !== $configHash) {
                    throw new \UnexpectedValueException('composer.json hash mismatch after update, please restart');
                }

                $result = copy($lockFile, $configLockCacheFile);
                if (false === $result) {
                    throw new \RuntimeException('failed to store composer.lock into cache: ' . var_export($configLockCacheFile, true));
                }
            } elseif ($this->fileHash('lock-compare', $lockFile) !== $this->fileHash('lock-compare', $configLockCacheFile)) {
                $result = copy($configLockCacheFile, $lockFile);
                if (false === $result) {
                    throw new \RuntimeException('failed to restore composer.lock from cache: ' . var_export($configLockCacheFile, true));
                }
                $lockRestoredFromCache = true;
            }
            touch($configLockCacheFile);
        }

        if ($lockRestoredFromCache) {
            printf("lock restored from cache: %s\n", var_export($configLockCacheFile, true));
        }
    }

    private function fileHash(string $prefix, string $path): string
    {
        if (!in_array($prefix, $this->prefixes, true)) {
            throw new \InvalidArgumentException('unknown prefix: ' . var_export($prefix, true));
        }

        if (!is_file($path)) {
            throw new \RuntimeException('not a file: ' . var_export($path, true));
        }
        $size = filesize($path);
        $buffer = file_get_contents($path);
        if (false === $buffer || $size !== strlen($buffer)) {
            throw new \RuntimeException('failed to read file: ' . var_export($path, true));
        }
        return $prefix . '-' . sha1($buffer) . '-' . (string) $size;
    }
}

$cache = new Cache(__DIR__, 2);
$config = Config::create($cache->getProjectPathname());
$cache->init($config);
$cache->main($argv);
$cache->touchLock();
