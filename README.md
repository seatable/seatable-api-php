# seatable-api-php

Simple php class to use the SeaTable Web API.

## Requirements

* PHP 7.0 or newer
* php-curl

## Installation

There is no installation necessary. Just copy the SeaTableAPI.php to your project and include the api-class.

## Usage

#### Establish the connection

```php
<?php

// include the php class
require_once '/var/www/seatable.io/lib/SeaTableAPI.php';

// init and obtain auth token
$seatable = new SeaTableAPI(array(
    'url'       => 'https://cloud.seatable.io', 
    'user'      => 'YOUR-EMAIL',
    'password'  => 'YOUR-PASSWORD'
));

// start using the available api calls
echo $seatable->ping();

?>
```

#### Admin functions

* listUsers($per_page = 25, $page = 1)
* getTotalUsers()
* addUser($email, $name, $password, $role = 'default')
