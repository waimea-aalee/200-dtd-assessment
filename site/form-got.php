<?php
require 'lib/utils.php';
include 'partials/top.php';
?>

<h2>Add Tool</h2>

<form method="post" action="add-tool">

    <label>Tool:</label>
    <input name="name"
        type="text"
        placeholder="e.g Hammer"
        minlength="3"
        required>

