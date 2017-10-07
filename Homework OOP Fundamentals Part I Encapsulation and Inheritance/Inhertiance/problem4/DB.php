<?php


class DB
{
    private $playList = [];
    private $songsCount;
    private $trackLength;

    /**
     * @return mixed
     */
    public function getSongsCount(){
        return $this->songsCount;
    }

    /**
     * @return mixed
     */
    public function getTrackLength() {
        $formatTrackLength = [];
        if ($this->trackLength[0] < 10) {
            $formatTrackLength[] = '0'.$this->trackLength[0];
        } else {
            $formatTrackLength[] = $this->trackLength[0];
        }
        if ($this->trackLength[1] < 10) {
            $formatTrackLength[] = '0'.$this->trackLength[1];
        } else {
            $formatTrackLength[] = $this->trackLength[1];
        }
        if ($this->trackLength[2] < 10) {
            $formatTrackLength[] = '0'.$this->trackLength[2];
        } else {
            $formatTrackLength[] = $this->trackLength[2];
        }
        return $formatTrackLength;
    }

    /**
     * @param array $playList
     */
    public function setPlayList($song) {
        if ($song->artistName == null || $song->songName == null || $song->duration == null) {
            return null;
        }
        $this->playList[] = $song;
        $this->songsCount = count($this->playList);
        $time = [0, 0, 0];
        foreach ($this->playList as $song) {
            $time = $this->sumTime($time[0], $song->duration[0], $time[1], $song->duration[1] , $time[2], $song->duration[2]);
        }
        $this->trackLength = $time;
    }

    private function sumTime($hours1 = 0, $hours2 = 0, $minutes1, $minutes2, $seconds1, $seconds2) {
        $seconds = 0;
        $minutes = 0;
        $hours = 0;

        if ($seconds1 + $seconds2 <= 59) {
            $seconds = $seconds1 + $seconds2;
        } else {
            $seconds = $seconds1 + $seconds2 - 60;
            $minutes++;
        }

        if ($minutes + $minutes1 + $minutes2 <= 59) {
            $minutes = $minutes + $minutes1 + $minutes2;
        } else {
            $minutes = $minutes + $minutes1 + $minutes2 - 60;
            $hours++;
        }

        $hours = $hours + $hours1 + $hours2;
        return [$hours, $minutes, $seconds];
    }


}