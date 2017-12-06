<?php

namespace ApiDoc\Entity;

use ApiDoc\Helper\MagicGetterAndSetterTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="header")
 */
class Header
{
    use MagicGetterAndSetterTrait;
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Item", inversedBy="headers")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     */
    protected $item;
    
    /** 
     * @ORM\Column(type="string", name="`key`")
     */
    protected $key;
    
    /** 
     * @ORM\Column(type="string", name="`value`")
     */
    protected $value;
}

