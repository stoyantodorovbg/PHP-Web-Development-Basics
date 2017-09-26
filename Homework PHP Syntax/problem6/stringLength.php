<?php
$text = fgets(STDIN);
for ($i = 0; $i < 20; $i++) {
    if ($i < strlen($text)) {
        echo $text[$i];
    } else {
        echo '*';
    }
}
