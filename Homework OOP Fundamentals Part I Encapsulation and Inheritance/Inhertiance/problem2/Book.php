<?php


class Book
{
    protected $author;
    protected $title;
    protected $price;
    protected $type;
    protected $message = 'OK';

    public function __construct($author,$title, $price, $type) {
        $this->author = $this->setAuthor($author);
        $this->title = $this->setTitle($title);
        $this->price = $this->setPrice($price);
        $this->type = $this->setType($type);
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function getPrice() {
        return $this->price;
    }

    protected function setAuthor($author) {
        $authorArr = explode(' ', $author);
        if (ctype_alpha($authorArr[1][0])) {
            return $this->author = $author;
        } else {
            return $this->message = 'Author not valid!';
        }
    }

    protected function setTitle($title) {
        if (strlen($title) >= 3) {
            return $this->title = $title;
        } else {
            return $this->message = 'Title not valid!';
        }
    }

    protected function setPrice($price) {
        $price = floatval($price);
        if ($price > 0) {
            return $this->price = $price;
        } else {
            return $this->message = 'Price not valid!';
        }
    }

    protected function setType($type) {
        if ($type == 'STANDARD') {
            return $this->type = $type;
        } else {
            return $this->message = 'Type is not valid!"';
        }
    }
}