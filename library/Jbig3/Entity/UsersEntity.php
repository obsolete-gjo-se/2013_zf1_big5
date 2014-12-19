<?php
namespace Jbig3\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3\Entity\Repository\UsersRepository")
 * @ORM\Table(
 *     name="users")
 * @ORM\HasLifecycleCallbacks
 */
class UsersEntity extends BaseEntity {
     
    /**
     *  @ORM\Id
     *  @ORM\GeneratedValue(
     *      strategy="IDENTITY")
     *  @ORM\Column(
     *      name="id",
     *      type="integer")
     */ protected $id;

    /**
     * @ORM\Column(
     *     name="email",
     *     type="string",
     *     length=255,
     *     unique=true)
     */ protected $email;
    
    /**
     * @ORM\Column(
     *     name="password",
     *     type="string",
     *     length=32)
     */ protected $password;
    
    /**
     * @ORM\Column(
     *     name="firstname",
     *     type="string",
     *     length=80)
     */ protected $firstname;
    
    /**
     * @ORM\Column(
     *     name="surname",
     *     type="string",
     *     length=80)
     */ protected $surname;
    
    /**
     * @ORM\Column(
     *     name="created",
     *     type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\Column(
     *     name="updated",
     *     type="datetime")
     */
    protected $updated;
    
    /**
     * @ORM\ManyToMany(
     *     targetEntity="RolesEntity",
     *     inversedBy="users")
     * @ORM\JoinTable(
     *     name="users_roles",
     *     joinColumns={
     *         @ORM\JoinColumn(
     *             name="user_id",
     *             referencedColumnName="id")},
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(
     *             name="role_id",
     *             referencedColumnName="id")})
     */ protected $roles;
    
    /**
     * @ORM\OneToMany(
     *     targetEntity="PtestEntity",
     *     mappedBy="userId")
     */ protected $i_ptest;
    
    public function __construct(){
        
        $this->roles = new ArrayCollection();
        $this->i_ptest = new ArrayCollection();
        
        $this->created = $this->updated = new \DateTime("now");
    
    }
}