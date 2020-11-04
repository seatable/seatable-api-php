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

#### Get Access to a base

SeaTable requires an additional authentification to get access to a specific base. There are two possibilities to get this access. You can either 
1) create within SeaTable an API-Token for a specific base or 
2) you use your credentials but then you have to provide the workspace_id and the name of the base.

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

// get access with an api-token for a base
$seatable->getDTableToken(array(
	'api_token' => '1d3303315348c6b566c44709d459b33b6bac5ad1',
));

// get access with an 
$seatable->getDTableToken(array(
	'workspace_id' => '1323',
	'table_name' => 'Project tracker'
));

// start using the available api calls to edit the data inside a base
// ...
?>
```


#### Admin functions (Users)

* listUsers($per_page = 25, $page = 1)
* getTotalUsers()
* addUser($email, $name, $password, $role = 'default')
* searchUser($query)
* updateUser($email, $changes)
* activateUser($email)
* deactivateUser($email)
* deleteUser($email)

#### Admin functions (Workspaces)

* listAllWorkspaces()
* listStarredWorkspaces()
* updateDTable($workspace_id, $dtable_name, $changes = array())
* copyDTableExternalLink($link, $dst_workspace_id)

#### Admin function (Teammanagement)

On the webpage SeaTable always talks about <i>teams</i>. The technical terms that is used within the API documentation or the manual is <i>organization</i>.

* listOrganizations($per_page = 25, $page = 1)
* addOrganization($org_name, $admin_email, $admin_name, $password, $max_user_number)
* deleteOrganization($org_id)
* updateOrganization($org_id, $org_changes = array())
* listOrgUsers($org_id, $is_staff = true, $per_page = 25, $page = 1)
* addOrgUser($org_id, $email, $pass, $name = "")
* deleteOrgUser($org_id, $email)
* listOrgGroups($org_id)
* listOrgBases($org_id, $per_page = 25, $page = 1)

#### Functions to work with a base

* listRowsByView($table_name, $view_name = "")
* appendRow($table_name, $row)
* getDtableMetadata()
* getColumnsFromTable($table_name)

More functions will be added in the future. If you want to get a feeling about the usage of the functions, please have a loot at the examples.

## Common mistakes

#### There are two email addresses in SeaTable

Please don't be confused with the term "email". There are two email addresses in SeaTable. Let's have a look at the user object in SeaTable
```
{
    "data": [
        {
            "email": "1ef456ab715841cc81b145b2530c2904@auth.local",
            "name": "John Doe",
            "contact_email": "john@gmail.com,
            "is_staff": true,
            "is_active": true,
            "role": "default",
            ...
        }
    ],
    "total_count": 1
}
```

SeaTable creates for every user an unique identifier in form of an email address like <i>1ef456ab715841cc81b145b2530c2904@auth.local</i>. This unique identifier is used by the api calls to identify a user like in deleteOrgUser().

On the other hand a user registers with an email address for SeaTable. In this example this email is <i>john@gmail.com</i>i>. This is the <i>contact_email</i> and only relevant for the authentification.
