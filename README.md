# seatable-api-php

PHP-bindings of the SeaTable API ([api.seatable.io]).

[api.seatable.io]: https://api.seatable.io/

## Requirements

PHP 7.0+ with the Curl and Json extension (see [`composer.json`](composer.json)).

## Installation

The SeaTable API installs as part of your project dependencies. It is [available from Packagist](https://packagist.org/packages/seatable/seatable-api-php) for [Composer](https://getcomposer.org/):

```
composer require seatable/seatable-api-php
```

### Upgrading

This project is with [Semantic Versioning (2.0.0)](https://semver.org/).

Please see [the notes on upgrading](UPGRADING.md), especially for upgrading from the `SeaTableAPI.php` single class/file and other very early versions (0.x).

## Usage

#### Establish the Connection

```php
<?php declare(strict_types=1);

// setting up autoloader
require_once __DIR__ . '/vendor/autoload.php';

// init and obtain auth token
$seatable = new SeaTableAPI([
    'url'       => 'https://cloud.seatable.io',
    'user'      => 'YOUR-EMAIL',
    'password'  => 'YOUR-PASSWORD'
]);

// start using the available api calls
echo $seatable->ping();
```

#### Get Access to a Base

SeaTable requires an additional authentication to get access to a specific base. There are two variants to obtain access. You can either:

1. create within SeaTable an API-Token for a specific base _- or -_
2. use your credentials, but then you have to provide the `workspace_id` and the name of the base.

```php
<?php declare(strict_types=1);

// setting up autoloader
require_once __DIR__ . '/vendor/autoload.php';

// init and obtain auth token
$seatable = new SeaTableAPI([
    'url'       => 'https://cloud.seatable.io',
    'user'      => 'YOUR-EMAIL', # required for variant 2.
    'password'  => 'YOUR-PASSWORD'
]);

// get access with an api-token for a base
$seatable->getDTableToken([
	'api_token' => '1d3303315348c6b566c44709d459b33b6bac5ad1',
]);

// get access with your credentials (by workspace-id and table-name)
$seatable->getDTableToken([
	'workspace_id' => '1323',
	'table_name' => 'Project tracker'
]);

// start using the available api calls to edit the data inside a base
// ...
```

#### Admin Functions (User)

* `listUsers($per_page = 25, $page = 1)`
* `getTotalUsers()`
* `addUser($email, $name, $password, $role = 'default')`
* `searchUser($query)`
* `updateUser($email, $changes)`
* `activateUser($email)`
* `deactivateUser($email)`
* `deleteUser($email)`

#### Workspace Functions (Admin)

* `listAllWorkspaces()`
* `listStarredWorkspaces()`
* `updateDTable($workspace_id, $dtable_name, $changes = [])`
* `copyDTableExternalLink($link, $dst_workspace_id)`

#### Teammanagement Functions (Admin)

> **Note:** On the webpage SeaTable always talks about *teams*. The technical terms that is used within the API documentation and manual is *organization*.

* `listOrganizations($per_page = 25, $page = 1)`
* `addOrganization($org_name, $admin_email, $admin_name, $password, $max_user_number)`
* `deleteOrganization($org_id)`
* `updateOrganization($org_id, $org_changes = [])`
* `listOrgUsers($org_id, $is_staff = true, $per_page = 25, $page = 1)`
* `addOrgUser($org_id, $email, $pass, $name = "")`
* `deleteOrgUser($org_id, $email)`
* `listOrgGroups($org_id)`
* `listOrgBases($org_id, $per_page = 25, $page = 1)`

#### Functions to Work with a Base (Table Data)

* `listRowsByView($table_name, $view_name = "")`
* `appendRow($table_name, $row)`
* `getDtableMetadata()`
* `getColumnsFromTable($table_name)`

More functions will be added in the future. If you want to get a feeling about the usage of the functions, please have a look at the examples in the `doc` folder.

## Common Mistakes

#### There are two kind of Email-Addresses in SeaTable

There are two kind of email-addresses in SeaTable. Please don't be confused with the property `email`. There are two email addresses in SeaTable. Let's have a look at the user object in SeaTable:
```
{
    "data": [
        {
            "email": "1ef456ab715841cc81b145b2530c2904@auth.local",
            "name": "Jane Doe",
            "contact_email": "jane@example.com,
            ...
        }
    ],
    "total_count": 1
}
```

SeaTable creates for every user an unique identifier in form of an email address in the form of `1ef456ab715841cc81b145b2530c2904@auth.local`. This unique identifier is used by the api calls to identify a user like in `deleteOrgUser()`.

On the other hand a user registers with an email address for SeaTable. In this example this email is `jane@example.com`. This is the *`contact_email`* and only relevant for the authentication.
