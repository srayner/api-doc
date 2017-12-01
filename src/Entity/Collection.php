<?php

namespace ApiDoc\Entity;

use ApiDoc\Helper\MagicGetterAndSetterTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="collection")
 */
class Collection
{
    use MagicGetterAndSetterTrait;
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /** 
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="collection")
     */
    protected $items;
    
    /**
     * Collection constructor
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }
}