
<form method="get">
    <div>
Options:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
Number 1:
        <input type="text" name="num1">
    </div>
    <div>
Number 2:
        <input type="text" name="num2">
    </div>
    <?php
    if (isset($result)) {
        echo "Result: <input type='text' style='color: red' value='$result'>";
    }
    ?>
    <div>
        <input type="submit" name="calculate" value="Calculate">
    </div>
</form>

<?php