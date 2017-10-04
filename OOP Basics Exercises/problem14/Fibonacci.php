<?php


class Fibonacci
{
    public $fibNumbers = [];

    public function getFibNums($start, $end) {
        $fibNums = [];
            for ($i = 0; $i < $end; $i++) {
                if ($i == 0) {
                    $fibNums[] = 0;
                } elseif ($i == 1) {
                    $fibNums[] = 1;
                } else {
                    $fibNums[] = $fibNums[$i - 1] + $fibNums[$i - 2];
                }
            }

            $result = [];
            for ($i = $start; $i < $end; $i++) {
                $result[] = $fibNums[$i];
            }
        $this->fibNumbers = $result;
    }

    public function __toString() {
        return implode(', ', $this->fibNumbers);
    }
}