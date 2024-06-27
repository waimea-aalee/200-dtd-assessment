<?php require_once '_config.php'; ?>

<?php

$page = basename($_SERVER['SCRIPT_NAME']);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" href="css/pico.lime.min.css" />
    <title><?= SITE_NAME ?></title>
  </head>

  <body>
    <main class="container">
        <h1><?= SITE_NAME ?></h1>
        <nav>
            <a href="show-needed.php"     class="<?= $page=='show-needed.php'     ? 'active' : '' ?>">View Needed</a>
            <a href="index.php"     class="<?= $page=='index.php'     ? 'active' : '' ?>">🏠︎</a>
        </nav>
    </main>
  </body>
</html>