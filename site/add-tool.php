<?php
require 'lib/utils.php';

consoleLog($_POST, 'POST Data');

// Get form data
$name       = $_POST['name'];
$amount     = $_POST['amount'];
$location   = $_POST['location'];
$got        = $_POST['got'];

// Connect to database
$db = connectToDB();

// Setup query to get all tool info
$query = 'INSERT INTO tool
        (name, amount, location, got)
        VALUES (?, ?, ?, ?';

// Attempt to run query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $amount, $location, $got]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'Tool Add', ERROR);
    die('There was an error adding tool to the list');
}

header('location: index.php');

?>