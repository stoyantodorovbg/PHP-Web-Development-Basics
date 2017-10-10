<?php


class GrandSon extends Person {
    public function getGenerationNum() {
        return [3, 'GrandSon'];
    }

    public function getTimeLived() {
        return $this->ageDead - $this->ageBirth ;
    }
}