<?php

namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\DimensionRepository",
 *     readOnly=true)
 * @ORM\Table(
 *     name="dimension")
 */
class DimensionEntity extends BaseEntity{
    
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
	
	/** TODO Casacade klären
     * @ORM\OneToMany(
     * targetEntity="SubdimensionEntity",
     * cascade={"persist", "remove"},
     * mappedBy="m_dimension")
     */ protected $i_subdimensions;
    
    public function __construct(){
        $this->i_subdimensions = new ArrayCollection();
    }
}