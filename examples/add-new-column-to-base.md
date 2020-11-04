# Example: add a new column to a base

## Prerequisites

* you need an SeaTable Account like demo@example.com
* you need an read/write API-Key for a base like 1d3303315348c6b566c44709d459b33b6bac5ad1
* you need the name of the table and the columns inside the base like 
  * table-name: Tasks
  * columns of this Table: Name, Description

## Example php-code


```php
<?php

// include the php class
require_once '/var/www/seatable.io/lib/SeaTableAPI.php';

// init and obtain auth token
$seatable = new SeaTableAPI(array(
    'url'       => 'https://cloud.seatable.io', 
    'user'      => 'demo@example.com',
    'password'  => 'very-secure-password'
));

// get access with an api-token for a base
$seatable->getDTableToken(array(
	'api_token' => '1d3303315348c6b566c44709d459b33b6bac5ad1',
));

// Append a row
$row = array(
	'Name' => "New Task XYZ",
	'Description' => "This is a new description"
);
$result = $seatable->appendRow('Tasks', $row);


?>
```