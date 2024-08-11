<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Weclome</h1>';

echo '<h2>Stock</h2>';

// Connecting to the database
$db = connectToDB();

// Setting up query to get list info
// ------------ FIX
// $query = 'SELECT * FROM tools';
// $query = 'SELECT tools.id   AS tid,
//                  tools.amount AS tamount,
//                  tools.name AS tname,
//                  tools.place AS tplace,
//                  area.location AS aloc,
//                  area.name AS aname
                 
//                  FROM tools
//                  JOIN area ON tools.place = area.name'; // ?

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

    echo '<ul id="tool-list-home">';

    foreach($gotTools as $tool) {
        echo '<li>';

        echo    '<a href="show-got.php?id=' . $tool['tid'] . '">';
        echo    $tool['tname'];
        echo    '</a>';

        echo    '<a href="' . $tool['tplace'] . '">';
        echo    $tool['area.name'];
        echo    '</a>';

        echo '</li>';
    }

echo    '</ul>';

//---------------------------------------------------------------------------------

echo '<div id="add-button">
        <a href="form-got.php">
         +
        </a>
</div>';

include 'partials/bottom.php';
?>