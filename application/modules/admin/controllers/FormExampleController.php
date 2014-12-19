<?php

class Admin_FormExampleController extends Jbig3_Controller_BaseController {
    
    private $_form;
    private $_redirectThenFormIsValid = '/admin/controller/create';
    private $_questions;

    public function showExampleFormAction(){
        
        $this->getAllQuestions();
        
        $this->form = new Admin_Model_Forms_ExampleForm($this->_questions);
        
        if($this->validForm()) {

            return $this->_redirect($this->_redirectThenFormIsValid);
            
        } else {
            
            $this->view->errors = $this->form->getErrors();
            
        }
        
        $this->view->exampleform = $this->form;
    
    }

    private function validForm(){
        
        if($this->getRequest()->isPost()) {
            
            if($this->form->isValid($this->_request->getPost())) {
                
                return true;
            
            } else {
                
                return false;
            }
        }
    }
    
    private function getAllQuestions(){
        
        $entity = 'Jbig3\Entity\QuestionEntity';
        $method = 'findAllQuestions';
        $viewvar = 'questions';
        
        $this->_questions = $this->em->getRepository($entity)->$method();
        
    }

}



