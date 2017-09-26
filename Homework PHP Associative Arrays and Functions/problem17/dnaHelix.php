<?php
$input = trim(intval(fgets(STDIN)));

$letters = ['AT', 'CG', 'TT', 'AG', 'GG'];

for ($i = 0, $e = 0, $a = 0; $i < $input; $i++, $e++, $a++){
    if ($e === 5) {
        $e = 0;
    }
    if ($a === 4) {
        $a = 0;
    }

    switch ($a) {
        case 0:
            echo "**$letters[$e]**\n";
            break;
        case 1:
            echo "*{$letters[$e][0]}--{$letters[$e][1]}*\n";
            break;
        case 2:
            echo "{$letters[$e][0]}----{$letters[$e][1]}\n";
            break;
        case 3:
            echo "*{$letters[$e][0]}--{$letters[$e][1]}*\n";
            break;
    }
}