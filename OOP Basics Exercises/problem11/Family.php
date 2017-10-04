<?php


class Family
{
    public $members;

    function addMember($member) {
        $this->members[] = $member;
    }

    function getOldestMember() {
        $oldest = 0;
        foreach ($this->members as $member) {
            if ($member->age > $oldest) {
                $oldest = $member->age;
            }
        }
        foreach ($this->members as $member) {
            if ($member->age == $oldest) {
                return $member;
            }
        }
    }
}