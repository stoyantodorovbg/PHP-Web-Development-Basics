<?php


class Archangel extends Being {

    public function hashPass() {
        $str = strrev($this->username);
        $num = strlen($this->username) * 21;
        return[$str, $num];
    }

    public function __toString() {
        return '"'.$this->username.'" | "'.$this->hashPass()[0].$this->hashPass()[1].'" -> Archangel'."\n".$this->calculatePoints();
    }
}