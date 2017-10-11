<?php


class LeutenantGeneral extends Private_ implements iLeutentantGeneral {
    protected $privates = [];

    /**
     * LeutenantGeneral constructor.
     * @param array $privates
     */
    public function __construct($id, $firstName, $lastName, $salary, $privates) {
        parent::__construct($id, $firstName, $lastName, $salary);
        $this->privates = $privates;
    }

    /**
     * @return array
     */
    public function getPrivates(): array {
        return $this->privates;
    }


    public function __toString() {
        return parent::__toString()."Privates:\n";
    }
}