<?php


class Commando extends SpecialisedSoldier {
    private $missions = [];

    public function completeMission() {

    }

    public function __toString() {
        return parent::__toString()."\nCorps: ".$this->corps."\n".'Missions:'."\n";
    }
}