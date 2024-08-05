<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Needed Stock</h1>';

// Connecting to the database
$db = connectToDB();

// Setting up query to get needed list info
$query = 'SELECT * FROM tool
          WHERE got = 0
          ORDER BY amount DESC';

// Attempt to run query
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $neededTools = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Tool Fetch', ERROR);
    die('There was an error getting tools');
}

// See what comes back
consoleLog($neededTools);

echo 'ul id="needed-tool-list">';

foreach($neededTools as $tool) {
    echo    '<li>';

    echo    '<span class="amount' . $tool['amount'] . '">';
    echo    $tool['amount'];
    echo    '</span>';

    echo    '<a class="name" href="show-got.php?id=' . $tool['id'] . '">';
    echo    $tool['name'];
    echo    '</a>';

    // echo    '<a href="toggle-ordered.php?id=' . $tool['id'] . '">';
    // echo    '☐';
    // echo    '</a>';

    echo    '</li>';
}

echo '</ul>';

?>

<fieldset>
    <legend>Status</legend>
    <label>
        <input type="radio"  id="ordered" name="status" value="ordered" checked />
        <label for="ordered">Ordered</label>
    <label>
        <input type="radio" id="arrived" name="status" value="arrived"/>
        <label for="arrived">Arrived</label>
</fieldset>

<?php

//------------------------------------------------------------------

echo '<div id="add-button">
        <a href="form-got.php">
        +
        </a>
</div>';

include 'partials/bottom.php';

?>