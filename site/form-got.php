<?php
require 'lib/utils.php';
include 'partials/top.php';
?>

<h2>Add Tool</h2>


<form method="post" action="add-tool.php">

    <!-- <label>Got?:</label>
    <select name="got" required>

 <?php
foreach($tools as $tool) {
    echo    '<option value"' . $tool['got'] . '">';
    echo    $tool['code'];
    echo    '</option>';
}
?> -->

<div id="add-item">
    <label>Name:</label>
    <input name="name"
        type="text"
        placeholder="e.g Hammer"
        minlength="2"
        required>

    <label>Amount:</label>
    <input name="amount"
        type="number"
        minlength="1"
        required>

    <label for="location-select">Location:</label>
<select name="location">
    <option value="1">At home</option>
    <option value="2">On site</option>
    <option value="3">Borrowed</option>
    <option value="4">Ordered</option>
    <option value="5">Arrived</option>
</select>


    <input type="submit" value="Add">
</div>

</form>

<div id="cancel-button">
    <a href="index.php" class="previous">&laquo; Cancel</a>
</div>


<?php
include 'partials/bottom.php';
?>