<?php
if (isset($_GET['submit'])) {
    if (isset($_GET['input'])) {
        $textArr = explode(' ', $_GET['input']);
        $text = implode('', $textArr);

        $textRez = '<p>';
        for ($i = 0; $i < strlen($text); $i++) {
            if (ord($text[$i]) % 2 === 0 ) {
                $textRez .= "<font color=\"red\">$text[$i] </font>";
            } else {
                $textRez .= "<font color=\"blue\">$text[$i] </font>";
            }
        }
        $textRez .= '</p>';

    }
}

include('form.php');
