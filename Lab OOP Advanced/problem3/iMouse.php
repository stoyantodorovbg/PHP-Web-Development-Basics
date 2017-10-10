<?php


interface iMouse {
    public function move($currentX, $currentY, $offsetX, $offsetY);
    public function click($leftClick, $rightClick);
}