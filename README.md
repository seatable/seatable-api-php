# seatable-api-php

PHP-bindings of the SeaTable API ([api.seatable.io]).

[api.seatable.io]: https://api.seatable.io/

=== "Requirements"

    PHP 7.2.5+ (deprecated, 7.4+ recommended) with the Curl and Json extension (see [`composer.json`](doc/composer-json.md)).

===  "Installation"

    The SeaTable API installs as part of your project dependencies. It is [available from Packagist](https://packagist.org/packages/seatable/seatable-api-php) for [Composer](https://getcomposer.org/):

    ```
    composer require seatable/seatable-api-php
    ```

===  "Upgrading"

    This project is with [Semantic Versioning (2.0.0)](https://semver.org/).

    Please see [the notes on upgrading](UPGRADING.md), especially for upgrading from the `SeaTableAPI.php` single class/file and other very early versions (0.x).

## Usage

### Get Access to a Base

SeaTable has additional authentication to access a specific base. The `README.md` presents two variants to obtain access. You normally *either*:

1. Create a SeaTable API-Token for a specific base, the _Base App API Token_. :material-star-shooting:{ title="Improved in 0.2.0" }
2. Use your credentials, and later on provide the `workspace_id` and the name of the base to obtain an (_internal_) _Base Access Token_.

=== "Base App API Token :material-star-shooting:{ title="Improved in 0.2.0" }"

    ```php
    <?php declare(strict_types=1);

    // setting up autoloader
    require_once __DIR__ . '/vendor/autoload.php';

    // use SeaTable api class
    use SeaTable\SeaTableApi\SeaTableApi;

    // init and obtain base access token
    $seatable = new SeaTableApi([
        'url'                => 'https://cloud.seatable.io',
        'base_app_api_token' => '1d3303315348c6b566c44709d459b33b6bac5ad1',
        'base_app_name'      => '(optional)',
    ]);

    // start using the available api calls to edit the data inside a base
    // ...
    ```

=== "Email+Password & Base Access Token"

    ```php
    <?php declare(strict_types=1);

    // setting up autoloader
    require_once __DIR__ . '/vendor/autoload.php';

    // use SeaTable api class
    use SeaTable\SeaTableApi\SeaTableApi;

    // init and obtain auth token
    $seatable = new SeaTableApi([
        'url'      => 'https://cloud.seatable.io',
        'user'     => 'YOUR-EMAIL', # required for variant 2.
        'password' => 'YOUR-PASSWORD'
    ]);

    // get access with your credentials (by workspace-id and table-name)
    $seatable->getBaseAccessToken(
        $workspaceID = 1323,
        $name = 'Project tracker'
    );

    // start using the available api calls to edit the data inside a base
    // ...
    ```
!!! tldr "More connection options"

    Please see [_Establish the Connection_](doc/establish-the-connection.md) for an overview of all connection options, the previous examples are for getting started.

If you want to get a feeling about the usage, please see the _Examples_ section:

* [Add a new Column to a Base](doc/add-new-column-to-base.md)
* [Get Content from a Base](doc/get-content-from-a-base.md)

### Functions

#### Admin Functions (User)

* `sysAdminListUsers(int $page = 1, int $perPage = 25)`
* `sysAdminAddUser(string $email, string $name, string $password, string $role = 'default')`
* `sysAdminSearchUser(string $query)`
* `sysAdminUpdateUser(string $email, array $changes = [])`
* `sysAdminDeleteUser(string $email)`

#### Workspace Functions (Admin)

* `updateBase(int $workspaceId, string $baseName, array $changes = [])`
* `copyBaseExternalLink(string $link, int $destinationWorkspaceId)`

#### Teammanagement Functions (Admin)

!!! note "Note"

    On the webpage SeaTable always talks about *teams*. The technical term that is used within the API documentation and manual is *organization* (or `org` in short).

* `sysAdminListTeams(int $page = 1, int $perPage = 25)`
* `sysAdminAddTeam(string $name, string $adminEmail, string $adminName, string $password, int $maxUser)`
* `sysAdminDeleteTeam(int $id)`
* `sysAdminUpdateTeam(int $id, array $changes = [])`
* `sysAdminListTeamUsers(int $id, int $page = 1, int $perPage = 25, bool $isStaff = false)`
* `sysAdminAddTeamUser(int $id, string $email, string $pass, string $name = null)`
* `sysAdminDeleteTeamUser(int $id, string $email)`
* `sysAdminListTeamGroups(int $id)`
* `sysAdminListTeamBases(int $id, int $page = 1, int $perPage = 25)`

#### Functions to Work with a Base (Table Data)

* `listRows(string $tableName, string $viewName = null, bool $convertLinkId = false, string $orderBy = null, bool $direction = false, int $start = 0, int $limit = 1000)`
* `appendRow(string $tableName, array $row)`
* `getBaseMetadata()`

!!! tldr "All Methods"

     For the full list of functions, please see all public methods of the class [`\SeaTable\SeaTableApi\SeaTableApi`](doc/seatableapi-php.md).

     More functions will be added in the future and the documentation improved.

## Common Mistakes

### There are two kind of Email-Addresses in SeaTable

There are two kind of email-addresses in SeaTable. Please don't be confused with the property `email`. There are two email addresses in SeaTable. Let's have a look at the user object in SeaTable:

```json
{
    "data": [
        {
            "email": "1ef456ab715841cc81b145b2530c2904@auth.local",
            "name": "Jane Doe",
            "contact_email": "jane@example.com",
            ...
        }
    ],
    "total_count": 1
}
```

SeaTable creates for every user a unique identifier in form of an email address in the form of `1ef456ab715841cc81b145b2530c2904@auth.local`. This unique identifier is used by the API calls to identify a user like in `deleteOrgUser()`.

On the other hand a user registers with an email address for SeaTable. In this example this email is `jane@example.com`. This is the *`contact_email`* and only relevant for the authentication.
