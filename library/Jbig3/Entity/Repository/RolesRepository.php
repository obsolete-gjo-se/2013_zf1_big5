<?php
namespace Jbig3\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class RolesRepository extends EntityRepository {
    
    public function findAllRoles(){
        
        $dql = 'SELECT g FROM Jbig3\Entity\RolesEntity g ORDER BY g.name ASC';
        
        $roles = $this->_em->createQuery($dql)->getResult();
        
        return $roles;
    }
}