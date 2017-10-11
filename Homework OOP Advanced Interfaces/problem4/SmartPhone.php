<?php


class SmartPhone implements iCall, iBrowse {

    public function browse($url) {
        if (!preg_match('#[\d]#', $url)) {
            return 'Browsing: '.$url.'!'."\n";
        } else {
            return 'Invalid URL!'."\n";
        }

    }

    public function call($number) {
        if (ctype_digit($number)) {
            return 'Calling... '.$number."\n";
        } else {
            return 'Invalid number!'."\n";
        }

    }
}