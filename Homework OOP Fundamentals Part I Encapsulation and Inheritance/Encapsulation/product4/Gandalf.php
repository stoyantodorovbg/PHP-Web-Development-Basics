<?php


class Gandalf
{
    public $moodPoints = 0;
    public $mood;
    public $foodInfluence = [
        'cram' => 2,
        'lembas' => 3,
        'apple' => 1,
        'melon' => 1,
        'honeycake' => 5,
        'mushrooms' => -10
    ];

    public function eat($food) {
        if(array_key_exists($food, $this->foodInfluence)) {
            $this->moodPoints += $this->foodInfluence[$food];
        } else {
            $this->moodPoints--;
        }
        $this->setMood();
    }

    private function setMood() {
        if ($this->moodPoints < -5) {
            $this->mood = 'Angry';
        } elseif ($this->moodPoints >= -5 && $this->moodPoints < 0) {
            $this->mood = 'Sad';
        } elseif ($this->moodPoints >= 0 && $this->moodPoints < 15) {
            $this->mood = 'Happy';
        } else {
            $this->mood = 'PHP';
        }
    }

    public function __toString() {
        return $this->moodPoints."\n".$this->mood;
    }
}