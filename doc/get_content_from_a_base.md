# Example: get content from a base

## Prerequisites

* you need an SeaTable Account like demo@example.com
* you need an API-Key for a base like 1d3303315348c6b566c44709d459b33b6bac5ad1 (read-only is enough)
* you need the name of the table like Articles
* you need the columns of this Table:
  * Status (single select)
  * Description
  * Title
  * URL

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
	'api_token' => '1d3303315348c6b577c44709d459b33b6bac5ad1',
));

// get all rows from the table Articles
$rows = $seatable->listRowsByView('Articles');

$reports = '
<ul class="press-reports">';
	foreach($rows as $a){
		if($a->Status == "published"){

$reports .= '
    <li>
        <h2><a href="'. $a->URL .'" target="_blank">'. $a->Title .'</a></h2>
        <div class="desc>
            <p>'. $a->Description .'</p>
        </div>
    </li>';
	}}
	$reports .= '
</ul>';

echo $reports;

?>
```
