<?php

namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\ItemRepository",
 *     readOnly=true)
 * @ORM\Table(
 *     name="item")
 */
class ItemEntity extends BaseEntity{
    
    /**
     *  @ORM\Id
     *  @ORM\GeneratedValue(
     *      strategy="NONE")
     *  @ORM\Column(
     *      name="id",
     *      type="integer")
     */ protected $id;
	
    /**
     *  @ORM\Column(
     *      name="name",
     *      type="string",
     *      length =100)
     */ protected $name;
	 
	/**
     *  @ORM\Column(
     *      name="description",
     *      type="string",
     *      length =255)
     */ protected $description;
    
    /**
     * @ORM\Column(
     *     name="amount",
     *     type="decimal",
     *     precision= 5, 
     *     scale= 2)
     */ protected $amount;
    
    /**
     * @ORM\Column(
     *     name="currency_code",
     *     type="string",
     *     length=5)
     */ protected $currencyCode;
	 
    public function __construct(){
    }
}