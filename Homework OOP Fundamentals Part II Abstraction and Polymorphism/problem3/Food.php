<?php


abstract class Food
{
    protected $type;
    protected $quantity;


    /**
     * Food constructor.
     * @param $quantity
     */
    public function __construct(string $type, int $quantity) {
        $this->type = $type;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }






}