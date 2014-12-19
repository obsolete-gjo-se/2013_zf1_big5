<?php

class Admin_RulesController extends Jbig3_Controller_BaseController {

    public function indexRulesAction(){
        
        $entity = 'Jbig3\Entity\RulesEntity';
        $repositoryFunction = 'findAllRules';
        $viewvar = 'rules';
        
        $repository = $this->em->getRepository($entity)->$repositoryFunction();
        $this->view->$viewvar = $repository;
        

       
    }

}