<?php

class Users_IndexController extends Jbig3_Controller_BaseController {

    public function indexSitemapAction(){

        $entity = 'Jbig3\Entity\SitemapEntity';
        $repositoryFunction = 'getAllSites';
        $viewvar = 'sites';

        $repository = $this->em->getRepository($entity)->$repositoryFunction();
        $this->view->$viewvar = $repository;

    }

}