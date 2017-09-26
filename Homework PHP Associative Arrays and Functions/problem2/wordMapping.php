<?php
if (isset($_GET['countWords'])) {
    if (isset($_GET['text'])) {
        $input = strtolower($_GET['text']);
        preg_match_all('/[a-zA-z]+/', $input, $result);
        $wordsCount = [];
        foreach ($result as $key => $word) {
            foreach($word as $k => $value) {
                if (array_key_exists($value, $wordsCount)) {
                    $wordsCount[$value]++;
                } else {
                    $wordsCount[$value] = 1;
                }
            }

        }
        $table = '<table border="2" bgcolor="white-blue">';
        foreach ($wordsCount as $key => $value) {
            $table .= "<tr><td>$key</td><td>$value</td></tr>";
        }
        $table .= '</table>';
    }
}

include('form.php');
