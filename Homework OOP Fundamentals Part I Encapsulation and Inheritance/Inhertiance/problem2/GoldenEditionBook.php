<?php


class GoldenEditionBook extends Book
{
    protected $type;
    public function __construct($author, $title, $price, $type) {
        parent::__construct($author, $title, $price, $type);
        $this->type = $this->setType($type);
    }

    public function getPrice() {
        return parent::getPrice() + parent::getPrice() * 0.3;
    }

    protected function setType($type) {
        if ($type == 'GOLD') {
            return $this->type = $type;
        } else {
            return $this->message = 'Type is not valid!"';
        }
    }
}