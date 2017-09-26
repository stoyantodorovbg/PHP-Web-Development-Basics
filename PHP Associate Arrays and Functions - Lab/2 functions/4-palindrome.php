<?php
$input = trim(fgets(STDIN));

isPalindromeFunc($input);

function isPalindromeFunc($text) {
    $isPalindrome = true;
    if (strlen($text) % 2 === 0) {
        for ($i = 0; $i < strlen($text) / 2; $i++) {
            if($text[$i] !== $text[(strlen($text) - $i) - 1]) {
                $isPalindrome = false;
            }
        }
    } else {
        for ($i = 0; $i < (strlen($text) / 2) - 1; $i++) {
            if($text[$i] !== $text[(strlen($text) - $i) - 1]) {
                $isPalindrome = false;
            }
        }
    }
    if ($isPalindrome) {
        echo 'true';
    } else {
        echo 'false';
    }
}

