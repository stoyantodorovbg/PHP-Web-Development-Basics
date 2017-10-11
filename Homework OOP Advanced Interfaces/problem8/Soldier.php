<?php


class Soldier implements iSoldier {
    protected $id;
    protected $firstName;
    protected $lastName;

    /**
     * Soldier constructor.
     * @param $id
     * @param $firstName
     * @param $lastName
     */
    public function __construct($id, $firstName, $lastName){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }




}