<?php
require 'lib/utils.php';

$id = $_GET['id'] ?? '';

// Connecting to database
$db = connectToDB();

// Setting up a query to update the completed field
$query = 'DELETE FROM tool
          WHERE id = ?';

// Attempt to run query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Pass on data
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Tool Delete', ERROR);
    die('There was an error deleting the tool');
}

header('location: index.php');