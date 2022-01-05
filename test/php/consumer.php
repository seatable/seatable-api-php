<?php // intentionally no declare(strict_types=1);

/*
 * seatable-api-php
 */

require __DIR__ . '/vendor/autoload.php';

$err = error_get_last();
if ($err['type'] !== E_USER_DEPRECATED || false === strpos($err['message'], 'will stop working in the future.')) {
    exit(1);
}
