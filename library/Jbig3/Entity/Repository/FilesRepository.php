<?php

namespace Jbig3\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class FilesRepository extends EntityRepository {

    public function findAllFiles(){
        
        $dql = 'SELECT f FROM Jbig3\Entity\FilesEntity f ORDER BY f.name ASC';
        
        $files = $this->_em->createQuery($dql)->getResult();
        return $files;
    }
}