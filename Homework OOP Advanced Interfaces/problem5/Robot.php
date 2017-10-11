<?php


class Robot implements iPersonalData {
    private $model;
    private $id;

    /**
     * Robot constructor.
     * @param $model
     * @param $id
     */
    public function __construct($model, $id) {
        $this->model = $model;
        $this->id = $id;
    }


    public function checkId($fakePart) {
        if (strpos($this->id, $fakePart)) {
            echo $this->id."\n";
        }
    }
}