
<?php


class Car
{
    public $model;
    public $engine;
    public $cargo;
    public $tyres;

    public function __construct($model, $engine, $cargo, $tyres) {
        $this -> model = $model;
        $this -> engine = $engine;
        $this -> cargo = $cargo;
        $this -> tyres = $tyres;
    }

    public function checkPressure($pressure)
    {
        $check = true;
        foreach ($this -> tyres as $tyre) {
            if ($tyre -> pressure >= $pressure) {
                $check = false;
            }
        }
        return $check;
    }

    public function checkEnginePower($power)
    {
        $check = true;
            if ($this -> engine -> enginePower <= $power) {
                $check = false;
            }
        return $check;
    }

    public function __toString() {
        return $this -> model . "\n";
    }

}