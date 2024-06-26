<?php require_once '_config.php'; ?>

<?php

$page = basename($_SERVER['SCRIPT_NAME']);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= SITE_NAME ?></title>

    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>

    <header>
        <h1><?= SITE_NAME ?></h1>

        <nav>
            <a href="show-needed.php"     class="<?= $page=='show-needed.php'     ? 'active' : '' ?>">View Needed</a>
            <a href="index.php"     class="<?= $page=='index.php'     ? 'active' : '' ?>">🏠︎</a>
        </nav>
    </header>

    <main>