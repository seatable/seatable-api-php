# Establish the Connection

The SeaTable PHP Api authenticates on creation by passing the authentication options as an associative array with the keys as option names and the values as the option values.

??? abstract "PHP Connection Example"

    ```php
    <?php declare(strict_types=1);

    // setting up autoloader
    require_once __DIR__ . '/vendor/autoload.php';

    // use SeaTable api class
    use SeaTable\SeaTableApi\SeaTableApi;

    // init and obtain auth token
    $seatable = new SeaTableApi([
        'url'       => 'https://cloud.seatable.io',
        'user'      => 'your email...',
        'password'  => 'you password...'
    ]);

    // start using the available api calls
    echo $seatable->ping();
    ```

## Options

* `url` URL of the SeaTable server instance. Without a trailing slash.

## Authentication Options

Depending on which authentication is preferred, authentication options are different for the different ways to authenticate.

Via the constructor option the class supports three different ways to authentication, of which one will be in effect:

1. [Username+Password](#usernamepassword-authentication)
2. [Auth-Token](#auth-token-authentication)
3. [Base-App-API-Token :material-star-shooting:](#base-app-api-token-authentication)

!!! tip "SeaTable Cloud Team-Admin"

    Find your API Token and Base Tokens under [**API & Integrations** (account.seatable.io)](https://account.seatable.io/api).

### Username+Password Authentication

* `user` Username as used in the frontend to login (email).
* `password` Password.

### Auth-Token Authentication

* `auth_token` The authentication token.

??? info "In the SeaTable API Docs"

    !!! quote "Authentication: a) User authentication (auth token)"

        The SeaTable API uses a token to authenticate requests. This _auth token_ can be created by an API request which requires username and password. As soon as you know your auth token, you do not need to provide your password again. An auth token is usually **40 characters** long and is a kind of persistent master key for your account.

    Compare _a) User authentication (auth token)_ in [**Authentication** (api.seatable.io)](https://api.seatable.io/#da9d1462-3945-41df-96c6-22cd63c97540).

### Base-App-API-Token Authentication

* `base_app_api_token` API token for the base app to authenticate against.
* `base_app_name` (optional) Name of the base app (can be given when creating the API token). Is verified when given.

!!! note "Best for Getting Started"

    :material-star-shooting: New in 0.2.0

    The `base_app_api_token` is the archetype of the SeaTable _API token_ when it comes to creating and interacting with your own apps and open-up to third-party integrations. It is also one of - if not _the_ - easiest to use, administer and manage over time. That's why we at SeaTable think this is the best option to get started and get the most out of a SeaTable Base (App).

??? info "In the SeaTable API Docs"

    !!! quote "Base API Token"

        Base API Tokens are extremely useful if you would like a third-party integration to manipulate your base automatically for you.

        For each third-party App, you can create a unique App API Token for them and define read/write permissions. This token is then valid until you delete them.

    Compare _Base API Token_ in [**Authentication** (api.seatable.io)](https://api.seatable.io/#6204fb15-8a49-4c98-8afd-71fd95ff033a).

## The Base-Access-Token

This form of authentication is used in the API and the SeaTable API PHP binding handles it during connection.  It is internal with the authentication options above.

It still can be acquired by the `getBaseAccessToken()` method to enable base access with [_Username+Password Authentication_](#usernamepassword-authentication) for a specific workspace and base, which stems from earlier versions.

??? info "In the SeaTable API Docs"

    !!! quote "Authentication: b) Base authentication (base access token)"

        To access a SeaTable base or manipulate the data or structure of a base you need another token. This one is called base access token. This base access token is about 249 characters long and is only valid for three days.

        There are currently three ways to get this base access token:

        1. create a base access token from an API token (created at SeaTable web interface)
        2. create a base access token via auth token
        3. create a base access token via invite link token

    Compare _b) Base authentication (base access token)_ in [**Authentication** (api.seatable.io)](https://api.seatable.io/#da9d1462-3945-41df-96c6-22cd63c97540).

??? done "Legacy Information"

    The pairing method `getBaseAppAccessToken()` is still available to obtain a base-access-token with the [_Base-App-API-Token Authentication_](#base-app-api-token-authentication) token, but it is recommended to use the now existing option instead: `base_app_api_token`.

## Options and API Doc Variables

Depending on area the names of options to variables varies a little, an overview across contexts.  Wording in parentheses.

| API PHP Option              | API Doc Variables                                                   | Team Admin           |
|-----------------------------|---------------------------------------------------------------------|----------------------|
| `auth_token`                | `admin_token`, `org_admin_token`, `user_token` (_auth token_)       | (_Your API Token_)   |
| `base_app_api_token`        | `base_api_token` (_API Token_ / _Base API Token_ / _App API Token_) | (_Your Base Tokens_) |
| _n/a_ (_Base-Access-Token_) | `access_token`                                                      | (_-/-_)              |
