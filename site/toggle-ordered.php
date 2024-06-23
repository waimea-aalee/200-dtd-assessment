<?php
require 'lib/utils.php';

$id = $_GET['id'] ?? '';

// Connect to database
$db = connectToDB();

// Setup a query to update the ordered field
$query = 'UPDATE tool
          SET location = ordered
          WHERE id = ?';

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Pass on the data
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task Ordered', ERROR);
    die('There was an error setting tool as ordered');
}

header('location: show-needed.php');