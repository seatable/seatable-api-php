<?php declare(strict_types=1);

/* PHP-CS-Fixer has no base-path/directory option, add it */
$basePath = getenv('PHP_CS_FIXER_CONFIG_BASE_PATH') ?: dirname(__DIR__, 2);
if (!is_dir($basePath)) {
    fprintf(STDERR, "fatal: not a directory: '%s'\n", $basePath);
    exit(1);
}

$finder = PhpCsFixer\Finder::create()
    ->in($basePath);

return (new PhpCsFixer\Config())
    ->registerCustomFixers(new PhpCsFixerCustomFixers\Fixers())
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setRules([
        '@PSR12' => true,
        '@PHP70Migration' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'whitespace_after_comma_in_array' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'align_multiline_comment' => true,
        'multiline_comment_opening_closing' => true,
        'no_empty_comment' => true,
        PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\InternalClassCasingFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoDuplicatedArrayKeyFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocParamOrderFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocParamTypeFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer::name() => ['allow_linebreak' => true],
    ])
    ->setFinder($finder);
