<?php


abstract class Being implements iBeing {
    protected $username;
    protected $level;
    protected $points;

    /**
     * Being constructor.
     * @param $username
     * @param $level
     * @param $points
     */
    public function __construct($username, $level, $points) {
        $this->username = $username;
        $this->level = floatval($level);
        $this->points = floatval($points);
    }


    public function calculatePoints() {
        return $this->points * $this->level;
    }
}