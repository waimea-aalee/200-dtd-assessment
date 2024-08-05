<?php
require 'lib/utils.php';

echo    '<div id="you-sure">';
echo    '<h1>Are you sure?</h1>';

echo 'Are you sure you want to delete this item?';

echo    '<div id="delete-yes">
        <a href="delete-tool.php">
        Yes
        </a>
</div>';

echo    '<div id="delete-no">
        <a href="index.php">
        No
        </a>
</div>';
