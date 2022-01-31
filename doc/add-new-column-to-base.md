# Example: Add a new Column to a Base

## Prerequisites

You need:

* a SeaTable account like `demo@example.com`
* an API-key for a base like `1d3303315348c6b566c44709d459b33b6bac5ad1` (read and write)
* the name of the table and the columns inside the base like
  * table-name: `Tasks`
  * columns of this table: `Name`, `Description`

## Example PHP-code

```php
<?php declare(strict_types=1);

// setting up autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// use SeaTable api class
use SeaTable\SeaTableApi\SeaTableApi;

// init and obtain auth token
$seatable = new SeaTableApi([
    'url'       => 'https://cloud.seatable.io',
    'user'      => 'demo@example.com',
    'password'  => 'very-secure-password'
]);

// get access with an api-token for a base
$seatable->getDTableAccessToken(
    '1d3303315348c6b566c44709d459b33b6bac5ad1'
);

// Append a row
$row = [
	'Name' => "New Task XYZ",
	'Description' => "This is a new description"
];
$result = $seatable->appendRow('Tasks', $row);
```
