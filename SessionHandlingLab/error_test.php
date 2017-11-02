<?php
define('IS_DEV', false);
//error_reporting(E_ALL);

echo @$a;

set_error_handler(function (int $err_num, string $err_str, string $err_file, int $err_line){
    error_log( $err_str);
    echo 'error'."$err_num, $err_str, $err_line";
    throw New Exception('Eroor: '. $err_str, $err_num);
    //exit();

});

//echo $a;
//$d = new PDO('');
try{
    //echo $a;
    //$d = new PDO('');
} catch (Exception $e) {
    ////echo $e;
}

set_exception_handler(function(Exception $e) {
    if (IS_DEV == true) {
        error_log( $e);
        echo 'exception'.$e;
    }
});
$d = new PDO('');

//ini_set('display_errors', '0');

