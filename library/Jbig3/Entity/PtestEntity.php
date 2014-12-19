<?php
namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\PtestRepository")
 * @ORM\Table(
 *     name="ptest")
 */
class PtestEntity extends BaseEntity {
     
    /**
     *  @ORM\Id
     *  @ORM\GeneratedValue(
     *      strategy="IDENTITY")
     *  @ORM\Column(
     *      name="id",
     *      type="integer")
     */ protected $id;
    
     /**
     * @ORM\ManyToOne(
     *     targetEntity="UsersEntity",
     *     inversedBy="i_ptest")
     * @ORM\JoinColumn(
     *     name="user_id",
     *     referencedColumnName="id")
     */ protected $userId;
     
    /** 
     * @ORM\OneToMany(
     *     targetEntity="PtestAnswerEntity",
     *     mappedBy="m_ptest")
     */
    protected $i_ptestAnswers;
    
    public function __construct(){

        $this->i_ptestAnswers = new ArrayCollection();

    }
}