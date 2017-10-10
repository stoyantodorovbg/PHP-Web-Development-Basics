<?php


class Father extends Person {
    public function getGenerationNum() {
        return [1, 'Father'];
    }

    public function getTimeLived() {
        return $this->ageDead - $this->ageBirth ;
    }
}