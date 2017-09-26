<form method="get">
    first number:
    <input type="text" name="firstNum">
    <br>
    second number:
    <input type="text" name="secondNum">
    <br>
    <input type="submit" name="submit">
</form>
<?php
if (isset($_GET['submit'])) {
    if($_GET['firstNum'] && $_GET['secondNum']) {
        $firstNumber = $_GET['firstNum'];
        $secondNumber = $_GET['secondNum'];
        $result = $firstNumber + $secondNumber;
        $result = round($result, 2);
        echo '$firstNumber + $secondNumber = ' . "$firstNumber + $secondNumber = $result";
    }
}
