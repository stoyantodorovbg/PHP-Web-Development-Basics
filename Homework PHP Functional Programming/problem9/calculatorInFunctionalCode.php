<?php

$simpleCalc = function ($num1, $num2, $op, $opSum, $opSubtract, $opMultiply, $opDivide) {
    $result = '';
    if ($op === '+') {
        $result = $opSum($num1, $num2);
    } elseif($op === '-') {
        $result = $opSubtract($num1, $num2);
    } elseif($op === '*') {
        $result = $opMultiply($num1, $num2);
    } elseif($op === '/') {
        $result = $opDivide($num1, $num2);
    }
    return $result;
};

$opSum = function ($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return 'Operand not numeric';
    } elseif (intval($num1) < -1E-15 || intval($num2) > 1E+15) {
        return 'Out of range';
    } else {
        return intval($num1) + intval($num2);
    }

};

$opSubtract = function ($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return 'Operand not numeric';
    } elseif (intval($num1) < -1E-15 || intval($num2) > 1E+15) {
        return 'Out of range';
    } else {
        return intval($num1) - intval($num2);
    }
};

$opMultiply = function ($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return 'Operand not numeric';
    } elseif (intval($num1) < -1E-15 || intval($num2) > 1E+15) {
        return 'Out of range';
    } else {
        return intval($num1) * intval($num2);
    }

};

$opDivide = function ($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return 'Operand not numeric';
    } elseif (intval($num1) < -1E-15 || intval($num2) > 1E+15) {
        return 'Out of range';
    } elseif (intval($num2) === 0){
        return 'Division By zero';
    } else {
        return intval($num1) / intval($num2);
    }
};
$result =  '';

if (isset($_GET['submit'])) {
    if (isset($_GET['num1']) || isset($_GET['num2']) || isset($_GET['operation']) ) {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $op = $_GET['operation'];

        $result = $simpleCalc($num1, $num2, $op, $opSum, $opSubtract, $opMultiply, $opDivide);
    }
}

include("calculatorFrontEnd.php");

?>

<form method="get">
    <input type="text" name="num1" />
    <input type="text" name="num2" />
    <select name="operation">
        <option name="sum">+</option>
        <option name="subtract">-</option>
        <option name="multiply">*</option>
        <option name="divide">/</option>
    </select>
    <input type="submit" name="submit" value="Go" />
    <br /> <br />
    = <input type="text" value="<?php echo $result ?>" name="result" />
</form>

