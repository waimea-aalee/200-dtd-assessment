<?php
require 'lib/utils.php';
include 'partials/top.php';

$id = $_GET['id'] ?? '';

// SQL to get tool info
// SELECT * FROM tool WHERE id = XX

// Connect to the database
$db = connectToDB();

// Setup query to get all the tool info
$query = 'SELECT * FROM tool WHERE id = ?';

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Pass on data
    $tool = $stmt->fetch(); // There will only be one result
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Tool Fetch', ERROR);
    die('There was an error getting tool info');
}

if ($tool == false) die('Unknown Tool: ' . $id);

echo '<h2>' . $tool['name'] . '</h2>';
echo '<p>Amount: ' . $tool['amount'] . '</p>';
echo '<p>Location: ' . $tool['location'] . '</p>';
echo '<p>Got? ' . $tool['got'] . '</p>';

echo '<div id="add-button">
<a href="form-got.php">
+
</a>
</div>';

include 'partials/bottom.php';