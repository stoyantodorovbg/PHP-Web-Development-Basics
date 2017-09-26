<form method="get">
    Categories:
    <input type="text" name="categories">
    <br>
    Tags:
    <input type="text" name="tags">
    <br>
    Months:
    <input type="text" name="months">
    <br>
    <input type="submit" name="generate" value="Generate">
</form>

<?php
if (isset($html)) {
    echo $html;
}


