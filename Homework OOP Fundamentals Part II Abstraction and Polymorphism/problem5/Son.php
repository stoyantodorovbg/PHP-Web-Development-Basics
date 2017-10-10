<?php


class Son extends Person {
    public function getGenerationNum() {
        return [2, 'Son'];
    }

    public function getTimeLived() {
        return $this->ageDead - $this->ageBirth ;
    }
}