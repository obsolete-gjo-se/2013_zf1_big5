<?php
namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\PtestAnswerRepository")
 * @ORM\Table(
 *     name="ptest_answer")
 */
class PtestAnswerEntity extends BaseEntity {
     
//     /**
//      *  @ORM\Id
//      *  @ORM\GeneratedValue(
//      *      strategy="IDENTITY")
//      *  @ORM\Column(
//      *      name="id",
//      *      type="integer")
//      */ protected $id;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(
     *     targetEntity="PtestEntity",
     *     inversedBy="i_ptestAnswers")
     * @ORM\JoinColumn(
     *     name="ptest_id",
     *     referencedColumnName="id")
     */ protected $m_ptest;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(
     *     targetEntity="QuestionEntity",
     *     inversedBy="i_ptestAnswers")
     * @ORM\JoinColumn(
     *     name="question_id",
     *     referencedColumnName="id")
     */ protected $m_question;

    /**
     * @ORM\Column(
     *     name="answer",
     *     type="integer")
     */ protected $answer;
    
    public function __construct(){
    }
    
    public function __toString() {
        return $this->answer;
    }
}