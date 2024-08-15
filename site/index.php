<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Weclome</h1>';

echo '<h2>Stock</h2>';

// Connecting to the database
$db = connectToDB();

// Setting up query to get list info
$query = 'SELECT * FROM tools
          ORDER BY place ASC, amount DESC';
// $query 'SELECT tools.name,
//                tools.place,
//                area.location,
//                area.name

//         FROM tools
//         JOIN area ON tools.place = area.location';  

// Attempt to run query
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $gotTools = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task Fetch', ERROR);
    die('There was an error getting tools');
 } 


// See what comes back
consoleLog($gotTools);

echo '<ul id="tool-list-got">';

foreach($gotTools as $tool) {
    echo '<li>';

 echo    '<a>' . $tool['amount'] . '</a>';
 echo    '<a href="show-got.php?id=' . $tool['id'] . '">';
 echo    $tool['name'];
 echo    '</a>';


 echo    '<select name="location">';
 echo    '<option value="1">At home</option>';
 echo    '<option value="2">On site</option>';
 echo    '<option value="3">Borrowed</option>';
 echo    '<option value="4">Ordered</option>';
 echo    '<option value="5">Arrived</option>';
 echo    '</select>';

    echo '</li>';
    }

echo '</ul>';

//---------------------------------------------------------------------------------

echo '<div id="save-button">
        <a href="update-tool.php">
         Save
        </a>
</div>';

//---------------------------------------------------------------------------------

echo '<div id="add-button">
        <a href="form-got.php">
         +
        </a>
</div>';

include 'partials/bottom.php';
?>