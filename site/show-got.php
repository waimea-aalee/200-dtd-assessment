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

echo '<p>Name: ' . $tool['name'] . '</p>';
echo '<p>Amount: ' . $tool['amount'] . '</p>';
echo '<p>Location: ' . $tool['location'] . '</p>';
echo '<p>Got? ' . $tool['got'] . '</p>'; ?>

<!-- <div id="edit-info">
<div class="quantity">
  <button class="minus" aria-label="Decrease">&minus;</button>
  <input type="number" class="input-box" value="1" min="1">
  <button class="plus" aria-label="Increase">&plus;</button>
</div> -->

<select name="location">
    <option value="1">At home</option>
    <option value="2">On site</option>
    <option value="3">Borrowed</option>
    <option value="4">Ordered</option>
    <option value="5">Arrived</option>
</select>
</div>

<?php
echo '<div id="save-button">
        <a href="index.php">
         Save
        </a>
</div>';

include 'partials/bottom.php'; ?>