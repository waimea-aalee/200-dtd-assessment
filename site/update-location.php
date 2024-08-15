<?php
require 'lib/utils.php';

$id = $_GET['id'] ?? '';

// Connect to database
$db = connectToDB();

$query = 'UPDATE tools'

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Pass on the data
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Location Update', ERROR);
    die('There was an error updating tool location');
}

header('location: index.php');