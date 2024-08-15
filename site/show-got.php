<?php
require 'lib/utils.php';
include 'partials/top.php';

$id = $_GET['id'] ?? '';

// SQL to get tool info
// SELECT * FROM tool WHERE id = XX

// Connect to the database
$db = connectToDB();

// Setup query to get all the tool info
$query = 'SELECT * FROM tools WHERE id = ?';

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

echo '<p>Name: ' . $tool['name'] . '</p>';
echo '<p>Amount: ' . $tool['amount'] . '</p>';
 ?>

<!-- <div id="edit-info">
<div class="quantity">
  <button class="minus" aria-label="Decrease">&minus;</button>
  <input type="number" class="input-box" value="1" min="1">
  <button class="plus" aria-label="Increase">&plus;</button>
</div> -->

<?php
echo '<div id="save-button">
        <a href="update-tool.php">
         Save
        </a>
</div>';

include 'partials/bottom.php'; ?>