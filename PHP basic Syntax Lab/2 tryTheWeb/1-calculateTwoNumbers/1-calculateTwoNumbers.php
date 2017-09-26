

<?php
if (isset($_GET['calculate'])) {
    $result = 0;
    $operation = $_GET['operation'];
    if ($operation === 'sum') {
        if (isset($_GET['num1'])) {
            $result += intval($_GET['num1']);
        }
        if (isset($_GET['num2'])) {
            $result += intval($_GET['num2']);
        }
    } elseif ($operation === 'subtract') {
        if (isset($_GET['num1']) && isset($_GET['num2'])) {
            $result = intval($_GET['num1']) - intval($_GET['num2']);
        } elseif (isset($_GET['num1'])) {
            $result = $_GET['num1'];
        }
    } else {
        $result = 'Invalid operation supplied</li>';
    }
}
include 'calculatorFrontEnd.php';