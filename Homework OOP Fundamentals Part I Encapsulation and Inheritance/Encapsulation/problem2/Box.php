<?php


class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height)
    {
        $this->length = $this->setLength($length);
        $this->width = $this->setWidth($width);
        $this->height = $this->setHeight($height);
    }


    private function setLength($length)
    {
        $length = floatval($length);
        if ($length > 0) {
            return $this->length = $length;
        } else {
            throw new Exception('Length cannot be zero or negative. ');
        }

    }

    public function setWidth($width)
    {
        $width = floatval($width);
        if ($width > 0) {
            return $this->width = $width;
        } else {
            throw new Exception('Length cannot be zero or negative. ');
        }
    }

    public function setHeight($height)
    {
        $height = floatval($height);
        if ($height > 0) {
        return $this->height = $height;
        } else {
            throw new Exception('Length cannot be zero or negative. ');
        }
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
        return 'Surface Area - '. $this->getArea() . "\n".
               'Lateral Surface Area - '. $this->getLateralArea() . "\n".
               'Volume - '. $this->getVolume() . "\n";
    }


}