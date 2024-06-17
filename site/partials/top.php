<?php require_once '_config.php';

$page = basename($_SERVER['SCRIPT_NAME']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">

    <title>Supply List</title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
    <h1>Supply List</h1>

        <nav>
            <a href="index.php"     class="<?= $page=='index.php'   ? 'active' : '' ?>">Supplies</a>
            <a href="show-needed.php"     class="<?= $page=='show-needed.php'   ? 'active' : '' ?>">View Needed</a>
        </nav>

    </header>

    <main>