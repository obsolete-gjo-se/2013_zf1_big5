<?php

namespace Jbig3\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class QuestionRepository extends EntityRepository {
    
    public function findAllQuestions(){
    
        $dql = 'SELECT q FROM Jbig3\Entity\QuestionEntity q';
        $maxResults = 5;
        
        $questions = $this->_em->createQuery($dql)->setMaxResults($maxResults)->getResult();
        
        return $questions;
    }
}