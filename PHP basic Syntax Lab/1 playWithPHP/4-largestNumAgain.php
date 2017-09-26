<?php
$nums = [];
while(true) {
    $line = trim(fgets(STDIN));
    if (empty($line)) {
        break;
    }
    array_push($nums, $line);
}

$maxNum = $nums[0];
foreach ($nums as $num) {
    if ($maxNum < $num) {
        $maxNum = $num;
    }
}
echo "Max: " . $maxNum;