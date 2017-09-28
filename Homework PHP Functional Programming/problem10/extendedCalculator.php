<?php

$simpleCalc = function ($num1, $num2, $op, $opSum, $opSubtract, $opMultiply, $opDivide, $opFactorial, $findFactorial, $opAverage) {
    $result = '';
    if ($op === '+') {
        $result = $opSum($num1, $num2);
    } elseif($op === '-') {
        $result = $opSubtract($num1, $num2);
    } elseif($op === '*') {
        $result = $opMultiply($num1, $num2);
    } elseif($op === '/') {
        $result = $opDivide($num1, $num2);
    } elseif($op === '!') {
        $result = $opFactorial($num1, $findFactorial($findFactorial, $num1, 1, 0));
    } elseif($op === 'average') {
        $result = $opAverage($num1, $num2);
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

$opAverage = function ($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return 'Operand not numeric';
    } elseif (intval($num1) < -1E-15 || intval($num2) > 1E+15) {
        return 'Out of range';
    } else {
        return (intval($num1) + intval($num2)) / 2;
    }
};

$opFactorial = function ($num1, $findFactorial) {
    if (!is_numeric($num1)) {
        return 'Operand not numeric';
    } elseif (intval($num1) < -1E-15) {
        return 'Out of range';
    }elseif (intval($num1) === 0){
        return 'Factorial By zero';
    } else {
        return $findFactorial(intval($num1));
    }
};

$findFactorial = function (&$findFactorial, $num, $counter, $out) {
    if ($counter <= $num) {
        return $findFactorial($num, $counter + 1, $out + $counter * $counter);
    } else {
        return $out;
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
        <option name="factorial">!</option>
        <option name="average">average</option>
    </select>
    <input type="submit" name="submit" value="Go" />
    <br /> <br />
    = <input type="text" value="<?php echo $result ?>" name="result" />
</form>


