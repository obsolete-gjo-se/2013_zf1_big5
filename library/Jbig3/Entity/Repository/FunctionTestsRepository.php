<?php

namespace Jbig3\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class FunctionTestsRepository extends EntityRepository {
    
    public function findAllFunctionTests(){
    
        $dql = 'SELECT f FROM Jbig3\Entity\FunctionTestsEntity f ORDER BY f.name ASC';
    
        $functionTests = $this->_em->createQuery($dql)->getResult();
    
        // TODO Pagination
        //         $pagination = new Zend_Paginator(
        //                 new DoctrineExtensions\Paginate\PaginationAdapter($controllers));
        //         $pagination->setCurrentPageNumber($this->_getPage())
        //             ->setItemCountPerPage(20)
        //             ->setPageRange(10);
    
        //         $this->view->$viewvar = $pagination;
    
        return $functionTests;
    }
}