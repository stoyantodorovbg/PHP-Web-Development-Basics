<?php


class Neshto extends Being {

    public function hashPass() {
        return strlen($this->username) * 217;
    }

    public function __toString() {
        return '"'.$this->username.'" | "'.$this->hashPass().'" -> Neshto'."\n".$this->calculatePoints();
    }
}