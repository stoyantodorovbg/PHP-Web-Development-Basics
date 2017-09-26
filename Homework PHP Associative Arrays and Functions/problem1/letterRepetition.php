<?php
$input = trim(fgets(STDIN));
$result = [];

for ($i = 0; $i < strlen($input); $i++) {
    if (!array_key_exists($input[$i],$result)) {
        $result[$input[$i]] = 1;
    } else {
        $result[$input[$i]]++;
    }
}

foreach ($result as $key => $value) {
    echo "$key => $value\n";
}
