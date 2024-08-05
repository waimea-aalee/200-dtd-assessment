<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Weclome</h1>';

echo '<h2>Stock</h2>';

// Connecting to the database
$db = connectToDB();

// Setting up query to get list info
// ------------ Fix
$query = 'SELECT area.location,
                 area.name,
                 tools.place,
                 tools.name,
                 tools.need
                 
         FROM tools
         JOIN area ON tools.place = area.location
         
         ORDER BY area.name ASC';

// Attempt to run query
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $gotTools = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task Fetch', ERROR);
    die('There was an error getting tools');
 } ?>

<!-- <input
  type="search"
  name="search"
  placeholder="Search..                          ⌕"
  aria-label="Search"
/> -->

<?php
// See what comes back
consoleLog($gotTools);

echo '<ul id="got-tool-list">';

foreach($gotTools as $tool) {
    echo    '<li>';

    echo    '<span class="amount' . $tool['amount'] . '">';
    echo    $tool['amount'];
    echo    '</span>';

    echo    '<a class="name" href="show-got.php?id=' . $tool['id'] . '">';
    echo    $tool['name'];
    echo    '</a>';

    echo    '</li>';
}

echo    '</ul>';

//------------------------------------------------------------------

echo '<div id="add-button">
        <a href="form-got.php">
         +
        </a>
</div>';

include 'partials/bottom.php'; ?>