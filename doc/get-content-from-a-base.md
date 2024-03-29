# Example: Get Content from a Base

## Prerequisites

You need:

* A SeaTable Base and for it an API-key like `1d3303315348c6b566c44709d459b33b6bac5ad1` (read-only is fine)
* A table name like `Articles`
* The columns in that table:
    * `Status` (single select)
    * `Description`
    * `Title`
    * `URL`

## Example PHP-code

=== "querySql :material-star-shooting:{ title="Improved in 0.2.0" }"

    ```php
    <?php declare(strict_types=1);

    // setting up autoloader
    require_once __DIR__ . '/../vendor/autoload.php';

    // use SeaTable api class
    use SeaTable\SeaTableApi\SeaTableApi;

    // init and get access with an api-token for a base
    $seatable = new SeaTableApi([
        'url'                => 'https://cloud.seatable.io',
        'base_app_api_token' => '1d3303315348c6b577c44709d459b33b6bac5ad1',
    ]);

    // get published rows from the table Articles
    $sql = "SELECT * FROM `Articles` WHERE `Status` = 'published'";
    $result = $seatable->querySql($sql, true);
    $rows = $result->results;

    ?>
    <ul class="my-reports">
    <?php foreach ($rows as $row) { ?>
        <li>
            <h2><a href="<?= htmlspecialchars($row->URL, ENT_QUOTES|ENT_HTML5) ?>"
                   target="_blank"><?=
                    htmlspecialchars($row->Title, ENT_QUOTES|ENT_HTML5)
                ?></a></h2>
            <div class="desc">
                <p><?= htmlspecialchars($row->Description, ENT_QUOTES|ENT_HTML5) ?></p>
            </div>
        </li>
    <?php } /* foreach $rows */ ?>
    </ul>
    ```

=== "listRows"

    ```php
    <?php declare(strict_types=1);

    // setting up autoloader
    require_once __DIR__ . '/../vendor/autoload.php';

    // use SeaTable api class
    use SeaTable\SeaTableApi\SeaTableApi;

    // init and get access with an api-token for a base
    $seatable = new SeaTableApi([
        'url'                => 'https://cloud.seatable.io',
        'base_app_api_token' => '1d3303315348c6b577c44709d459b33b6bac5ad1',
    ]);

    // get all rows from the table Articles
    $result = $seatable->listRows('Articles');
    $rows = $result->rows;

    ?>
    <ul class="my-reports">
    <?php foreach ($rows as $row) if ($row->Status === 'published') { ?>
        <li>
            <h2><a href="<?= htmlspecialchars($row->URL, ENT_QUOTES|ENT_HTML5) ?>"
                   target="_blank"><?=
                    htmlspecialchars($row->Title, ENT_QUOTES|ENT_HTML5)
                ?></a></h2>
            <div class="desc">
                <p><?= htmlspecialchars($row->Description, ENT_QUOTES|ENT_HTML5) ?></p>
            </div>
        </li>
    <?php } /* foreach $rows if $row->Status published */ ?>
    </ul>
    ```
