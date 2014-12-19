<?php

namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
         Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\FoldersRepository")
 * @ORM\Table(
 *     name="folders")
 */

class FoldersEntity extends BaseEntity {
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(
     * strategy="IDENTITY")
     * @ORM\Column(
     * name="id",
     * type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(
     * name="name",
     * type="string",
     * length=255,
     * nullable=true)
     */
    protected $name;
    
    public function __construct(){
    }
}