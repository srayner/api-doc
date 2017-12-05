<?php

namespace ApiDoc\Entity;

use ApiDoc\Helper\MagicGetterAndSetterTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="item")
 */
class Item
{
    use MagicGetterAndSetterTrait;
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Collection", inversedBy="items")
     * @ORM\JoinColumn(name="collection_id", referencedColumnName="id")
     */
    protected $collection;
    
    /** 
     * @ORM\Column(type="string")
     */
    protected $method;
    
    /** 
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /** 
     * @ORM\Column(type="string")
     */
    protected $description;
    
    /** 
     * @ORM\Column(type="string")
     */
    protected $url;
    
    /**
     * @ORM\OneToMany(targetEntity="Header", mappedBy="item")
     */
    protected $headers;
    
    /** 
     * @ORM\Column(type="string")
     */
    protected $body;
    
    /**
     * Item constructor
     */
    public function __construct()
    {
        $this->headers = new ArrayCollection();
    }
}
