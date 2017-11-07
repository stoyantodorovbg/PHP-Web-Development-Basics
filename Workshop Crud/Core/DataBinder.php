<?php
/**
 * Created by IntelliJ IDEA.
 * User: RoYaL
 * Date: 11/3/2017
 * Time: 9:51 PM
 */

namespace Core;


class DataBinder implements DataBinderInterface
{

    public function bind(array $from, $className)
    {
        $classInfo = new \ReflectionClass($className);
        $object = new $className();
        foreach ($from as $key => $value) {
            if ($classInfo->hasProperty($key)) {
                $propertyInfo = $classInfo->getProperty($key);
                $propertyInfo->setAccessible(true);
                $propertyInfo->setValue($object, $value);
            }
        }

        return $object;
    }
}