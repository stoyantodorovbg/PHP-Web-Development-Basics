<?php


class Ferrari implements iCar {
    private $model;
    private $driver;
    static public $objNum = 0;

    /**
     * Ferrari constructor.
     * @param $model
     * @param $driver
     */
    public function __construct($model, $driver) {
        $this->model = $model;
        $this->driver = self::forUrl($driver);
        self::$objNum++;
    }

    static public function forUrl(string $str, string $rep='-') {
        $str = strtolower($str);
        return str_replace(' ', $rep, $str);
    }

    /**
     * @param mixed $driver
     */
    public function setDriver($driver) {
        $this->driver = $driver;
    }

    /**
     * @return mixed
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getDriver() {
        return $this->driver;
    }

    public function useBreak() {
        return 'zadu6avam sA!';
    }

    public function useGas() {
        return 'Breaks!';
    }

    public function __toString() {
        return $this->getModel().'/'.$this->useBreak().'/'.$this->useGas().'/'.$this->getDriver();
    }


}