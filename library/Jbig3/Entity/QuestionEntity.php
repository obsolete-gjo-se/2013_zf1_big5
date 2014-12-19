<?php

namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\QuestionRepository",
 *     readOnly=true)
 * @ORM\Table(
 *     name="question")
 */
class QuestionEntity extends BaseEntity{
    
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
     *      name="description_short",
     *      type="string",
     *      length =100)
     */ protected $descriptionShort;
	 
	/**
     *  @ORM\Column(
     *      name="description_long",
     *      type="string",
     *      length =255)
     */ protected $descriptionLong;
    
    /**
     * @ORM\Column(
     *     name="language_code",
     *     type="string",
     *     length=2)
     */ protected $languageCode;
	 
    /**
     * @ORM\ManyToOne(
     *     targetEntity="SubdimensionEntity",
     *     inversedBy="i_questions")
     * @ORM\JoinColumn(
     *     name="subdimension_id",
     *     referencedColumnName="id")
     */ protected $m_subdimension;
    
    /**
     * @ORM\OneToMany(
     *     targetEntity="PtestAnswerEntity",
     *     mappedBy="m_question")
     */ protected $i_ptestAnswers;
		
    public function __construct(){
        
        $this->i_ptestAnswers = new ArrayCollection();
        
    }
}