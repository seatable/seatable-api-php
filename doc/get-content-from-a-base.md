# Example: Get Content from a Base

## Prerequisites

You need:

* a SeaTable account like `demo@example.com`
* an API-key for a base like `1d3303315348c6b566c44709d459b33b6bac5ad1` (read-only is enough)
* the name of the table like `Articles`
* the columns of this table:
  * `Status` (single select)
  * `Description`
  * `Title`
  * `URL`

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
$seatable->getDTableToken([
	'api_token' => '1d3303315348c6b577c44709d459b33b6bac5ad1',
]);

// get all rows from the table Articles
$rows = $seatable->listRowsByView('Articles');


$reportsHtml = '
<ul class="my-reports">';
	foreach($rows as $row){
		if ($row->Status === 'published') {

$reportsHtml .= '
    <li>
        <h2><a href="'. $row->URL .'" target="_blank">'. htmlspecialchars($row->Title, ENT_QUOTES | ENT_HTML5) . '</a></h2>
        <div class="desc>
            <p>'. htmlspecialchars($row->Description, ENT_QUOTES | ENT_HTML5) . '</p>
        </div>
    </li>';
	}}
	$reportsHtml .= '
</ul>';

echo $reportsHtml;
```
