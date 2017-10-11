<?php


class Mission {
    private $codeName;
    private $state;

    /**
     * Mission constructor.
     * @param $codeName
     * @param $state
     */
    public function __construct($codeName, $state) {
        $this->codeName = $codeName;
        $this->state = $state;
    }


    public function __toString() {
        return 'Code Name: '.$this->codeName.' State: '.$this->state."\n";
    }
}