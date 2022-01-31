<?php

declare(strict_types=1);

/*
 * seatable-api-php
 *
 * test composer autoloader triggers PHP deprecation
 */

$projectDir = dirname(__DIR__, 2);
$buildDir = $projectDir . '/build/composer';
assert(is_dir($buildDir) || @mkdir($buildDir, 0700, true) || is_dir($buildDir), "$buildDir exists");

$package = "seatable/seatable-api-php";

$config = [
    "repositories" => [
        $package => [
            "type" => "vcs",
            "url" => $projectDir,
            "options" => ["symlink" => false],
        ],
    ],
    "require" => [
        $package => "dev-" . rtrim(`if [ "\${b=$(git rev-parse --abbrev-ref HEAD)}" = HEAD ]; then echo 'main'; else echo "\$b"; fi`) . "#" . rtrim(`git show-ref --hash --verify HEAD`),
    ],
    "config" => [
        "platform" => [
            "php" => "7.4.0",
        ],
        "lock" => true,
        "preferred-install" => [
            $package => "source",
        ],
    ],
];
// echo `git show-ref --hash --verify HEAD`;
file_put_contents($buildDir . '/composer.json', json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");
is_file($buildDir . '/composer.lock') && unlink($buildDir . '/composer.lock');
is_file($buildDir . '/vendor/composer/installed.json') && unlink($buildDir . '/vendor/composer/installed.json');

passthru(sprintf('composer -d%s install --prefer-dist', escapeshellarg($buildDir)), $status);
assert(0 === $status);

assert(copy(__DIR__ . '/consumer.php', $buildDir . '/consumer.php'));

passthru(sprintf('exec %s %s/consumer.php', escapeshellarg('php7.0'), escapeshellarg($buildDir)), $status);
assert(0 === $status, (string) $status);

passthru(sprintf('exec %s %s/consumer.php', escapeshellarg('php5.6'), escapeshellarg($buildDir)), $status);
assert(255 === $status, (string) $status);

echo "OK. all tests have successfully passed.\n";
