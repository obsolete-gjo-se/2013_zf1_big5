<?php

namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\SubdimensionRepository",
 *     readOnly=true)
 * @ORM\Table(
 *     name="subdimension")
 */
class SubdimensionEntity extends BaseEntity{
    
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
     * @ORM\ManyToOne(
     *     targetEntity="DimensionEntity",
     *     inversedBy="i_subdimensions")
     * @ORM\JoinColumn(
     *     name="dimension_id",
     *     referencedColumnName="id")
     */ protected $m_dimension;
    
    /** TODO Casacade klären
     * @ORM\OneToMany(
     * targetEntity="QuestionEntity",
     * cascade={"persist", "remove"},
     * mappedBy="m_subdimension")
     */ protected $i_questions;

    
    public function __construct(){
        $this->questions = new ArrayCollection();
    }
}