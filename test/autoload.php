#!/usr/bin/env php
<?php
/*
 * SeaTable API - PHP class wrapper
 *
 * PHP/Composer autoload smoke test
 */

$path = __DIR__ . '/../vendor/autoload.php';
if (!is_file($path)) {
    fwrite(STDERR, "fatal: no autoload file found, install first.\n");
    exit(1);
}

require $path;

if (class_exists(SeaTableAPI::class, false)) {
    fwrite(STDERR, "fail: class already loaded.\n");
    exit(1);
}

if (!class_exists(SeaTableAPI::class, true)) {
    fwrite(STDERR, "fail: failed not autoload class.\n");
    exit(1);
}
