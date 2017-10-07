<?php


class Song
{
    public $artistName;
    public $songName;
    public $duration;

    /**
     * Song constructor.
     * @param $artistName
     * @param $songName
     * @param $duration
     */
    public function __construct($artistName, $songName, $duration) {
        $this->artistName = $this->setArtistName($artistName);
        $this->songName = $this->setSongName($artistName, $songName, $duration);
        $this->duration = $this->setDuration($duration);
        echo 'Song added.'."\n";
    }

    /**
     * @param mixed $artistName
     */
    public function setArtistName($artistName) {
        if (strlen($artistName) >= 3 && strlen($artistName) <= 20) {
            return $this->artistName = $artistName;
        } else {
            echo 'Artist name should be between 3 and 20 symbols.';
            return $this->artistName = null;
        }
    }

    /**
     * @param mixed $songName
     */
    public function setSongName($artistName, $songName, $duration) {
        if ($artistName == null || $songName == null || $duration == null) {
            throw new Exception('Invalid song.');
        }
        if (strlen($songName) >= 3 && strlen($songName) <= 30) {
            return $this->songName = $songName;
        } else {
            echo 'Song name should be between 3 and 30 symbols.';
            return $this->songName = null;
        }

    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration) {
        $durationArr = explode(':', $duration);
        $hours = 0;
        $minutes = intval($durationArr[0]);
        $seconds = intval($durationArr[1]);

        if ($minutes < 0 || $minutes > 14) {
            echo 'Song minutes should be between 0 and 14.';
            return $this->duration = null;
        } elseif ($seconds < 0 || $seconds > 59) {
            echo 'Song seconds should be between 0 and 59.';
            return $this->duration = null;
        } else {
            return $this->duration = [$hours, $minutes, $seconds];
        }
    }




}