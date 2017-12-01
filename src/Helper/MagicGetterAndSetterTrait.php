<?php

namespace ApiDoc\Helper;

use RuntimeException;

trait MagicGetterAndSetterTrait
{
    /**
     * Magic accessor method.
     * 
     * @param mixed $property
     * @return mixed
     * @throws RuntimeException
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        
        throw new RuntimeException(sprintf("Trying to get property %s which does not exist in class '%s'", $property, self::class));
        
    }
    
    /**
     * Magic mutator method.
     * 
     * @param mixed $property
     * @param mixed $value
     * @return mixed
     * @throws RuntimeException
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
            return $this;
        }
        
        throw new RuntimeException(sprintf("Trying to set property '%s' which does not exist in class '%s'", $property, self::class));
    }
}