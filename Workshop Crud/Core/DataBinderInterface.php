<?php
/**
 * Created by IntelliJ IDEA.
 * User: RoYaL
 * Date: 11/3/2017
 * Time: 9:51 PM
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $from, $className);
}