<?php


class Engineer extends SpecialisedSoldier {
    private $repairs = [];

    /**
     * Engineer constructor.
     * @param array $repairs
     */
    public function __construct($id, $firstName, $lastName, $salary, $corps, array $repairs){
        parent::__construct($id, $firstName, $lastName, $salary, $corps);
        $this->repairs = $repairs;
    }


    public function __toString() {
        return parent::__toString()."\nCorps:".$this->corps."\n".'Repairs:'."\n";
    }
}