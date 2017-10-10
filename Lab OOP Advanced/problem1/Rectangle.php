<?php


class Rectangle implements iArea {
    private $width;
    private $height;
    private $area;

    /**
     * Rectangle constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height) {
        $this->width = floatval($width);
        $this->height = floatval($height);
    }

    /**
     * @return float
     */
    public function getWidth(): float{
        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getArea(){
        return $this->area;
    }

    /**
     * @return float
     */
    public function getHeight(): float{
        return $this->height;
    }



    public function calcSurface(){
        $this->area = $this->width * $this->height;
    }
}