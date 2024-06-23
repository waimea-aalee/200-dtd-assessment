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

    <label for="location-select">Location:</label>
<select name="location">
    <option value="1">At home</option>
    <option value="2">On site</option>
    <option value="3">Borrowed</option>
    <option value="4">Ordered</option>
    <option value="5">Arrived</option>
</select>

</form>

<?php
include 'partials/bottom.php';
?>