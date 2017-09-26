
<form method="get">
    <div>
        Delimiter:
        <select name="delimiter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&">&</option>
        </select>
    </div>
    <div>
        Names:
        <input type="text" name="names">
    </div>
    <div>
        Ages:
        <input type="text" name="ages">
    </div>
    <div>
        <input type="submit" name="filter" value="Filter!">
    </div>
</form>
<?php
if (isset($_GET['filter'])){
    echo($table);
}

if (isset($_GET['counter'])){
    echo($table);
}

