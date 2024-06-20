<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Weclome</h1>';

// Connecting to the database
$db = connectToDB();

// Setting up query to get list info
$query = 'SELECT * FROM tool
          WHERE got = 1
          ORDER BY amount DESC';

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

foreach($gotTools as $tool) {
    echo    '<li>';

    echo    '<span class="amount' . $tool['amount'] . '">';
    echo    $tool['amount'];
    echo    '</span>';

    echo    '<a class="name" href="show-got.php?id=' . $tool['id'] . '">';
    echo    $tool['name'];
    echo    '</a>';

    echo    '<a href="delete-tool.php?id=' . $tool['id'] . '">';
    echo    '🗑️';
    echo    '</a>';

    echo    '</li>';
}

echo    '</ul>';