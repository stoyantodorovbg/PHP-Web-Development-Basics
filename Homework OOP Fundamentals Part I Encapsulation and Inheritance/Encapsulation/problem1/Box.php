<?php


class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height)
    {
        $this->length = floatval($length);
        $this->width = floatval($width);
        $this->height = floatval($height);
    }

    public function getArea() {
        return number_format(($this->length * $this->width) * 2 + ($this->width * $this->height) * 2 + ($this->length * $this->height) * 2, 2);
    }

    public function getLateralArea() {
        return number_format(($this->width * $this->height) * 2 + ($this->length * $this->height) * 2, 2);
    }

    public function getVolume() {
        return number_format($this->width * $this->height * $this->length, 2);
    }

    public function __toString() {
        return 'Surface Area – '. $this->getArea() . "\n".
                  'Lateral Surface Area - '. $this->getLateralArea() . "\n".
                  'Volume - '. $this->getVolume() . "\n";
    }


}