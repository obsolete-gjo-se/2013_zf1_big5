<?php

class Jbig3_Controller_BaseController extends Zend_Controller_Action {
    
    /**
     *
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    protected $users_em;
    private $_moduleName;
    private $_controllerName;
    private $_actionName;
    private $_auth;
    private $_currentUser;
    private $_roles = array();

    public function init(){
        
        parent::init();
        
        $this->_initEntityManager();
        $this->_initModuleSwitch();
        $this->_initHeadTitle();
        $this->_initHeadMeta();
        $this->_initHeadLink();
        $this->_initHeadScript();
        $this->setAuth();
        $this->setCurrentUserByEmail($this->_auth->getIdentity());
        
        
    }

    public function preDispatch(){
        parent::preDispatch();
        
        $this->setModuleName();
        $this->setControllerName();
        $this->setActionName();
        $this->_checkIsAllowed();
        $this->_checkResourceActionRules();
    }
    
    private function _checkIsAllowed(){
        
        if(! $this->_checkResourceActionRules()) {
        
            if(isset($this->_currentUser)) {
        
                return $this->_redirect('/admin/error/forbidden');
            }
        
            return $this->_redirect('/login');
        }
    }

    /**
     * Queries the Actions and Rules and redirects the user to a different
     * page if he doesn't have the required permissions for accessing the
     * current page
     *
     * @access protected
     * @return void
     */
    private function _checkResourceActionRules(){
        
        $isAllowed = false;
        
        if($this->_auth->hasIdentity()) {
            $this->setRolesByUserId($this->_currentUser->id);
        } else {
            $this->_roles[] = 'guests';
        }
        
        foreach ($this->_roles as $role) {
            if(Jbig3_Acl_Manager::isAllowed($role, $this->_moduleName . ':' . $this->_controllerName, $this->_actionName)) {
                $isAllowed = true;
            }
        }
        
        return $isAllowed;

    }

    protected function _initEntityManager(){
        $this->em = Zend_Registry::get('em');
    }

    protected function _initModuleSwitch(){
        
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $module = $request->module;
        switch ($module) {
            case "home":
                $this->view->layout()->setLayout('layout_front');
                break;
            case "admin":
                $this->view->layout()->setLayout('layout_admin');
                break;
            default:
                $this->view->layout()->setLayout('layout_default');
        }
    }

    protected function _initHeadTitle(){
        $this->view->headTitle('Inhalt aus DB')->setIndent(2);
    }

    protected function _initHeadMeta(){
        $this->view->headMeta()
            ->setIndent(2)
            ->setHttpEquiv('Content-Type', 'text/html; charset=utf-8')
            ->setName('keywords', 'Keywords aus DBöäü')
            ->setName('description', 'Description aus DB')
            ->setName('robots', 'Robots aus DB')
            ->setName('language', 'de');
    }

    protected function _initHeadLink(){
        $this->view->headLink()
            ->setIndent(2)
            ->setStylesheet('/css/central.css')
            ->appendStylesheet('/css/patches/patch_central.css', 'screen', 'lte IE 7')
            ->headLink(
                array(
                    'href' => '/images/favicon.ico', 
                    'rel' => 'shortcut icon', 
                    'type' => 'image/x-icon'
                ));
    }

    protected function _initHeadScript(){
        $this->view->headScript()
            ->setIndent(2)
            ->setFile('/js/jquery-1.7.1.min.js')
            ->appendFile('/js/jquery.validate.min.js');
    }
    
    protected function setModuleName($moduleName = NULL){
        
        if($moduleName == NULL){
            $this->_moduleName = $this->getRequest()->getModuleName();
        }else{
            $this->_moduleName = $moduleName;
        }
    }
    
    protected function getModuleName(){
        return $this->_moduleName;
    }
    
    protected function setControllerName($controllerName = NULL){
        
        if($controllerName == NULL){
            $this->_controllerName = $this->getRequest()->getControllerName();
        }else{
            $this->_controllerName = $controllerName;
        }
    }
    
    protected function getControllerName(){
        return $this->_controllerName;
    }
    
    protected function setActionName($actionName = NULL){
        
        if($actionName == NULL){
            $this->_actionName = $this->getRequest()->getActionName();
        }else{
            $this->_actionName = $actionName;
        }
    }
    
    protected function getActionName(){
        return $this->_actionName;
    }
    
    protected function setAuth(){
        $this->_auth = Zend_Auth::getInstance();
    }
    
    protected function getAuth(){
        return $this->_auth;
    }
    
    protected function setCurrentUserByEmail($email = NULL){
        
        if($email == NULL){
            return false;
        }else{
            $entity = 'Jbig3\Entity\UsersEntity';
            $method = 'findOneByEmail';
            
            $this->_currentUser =  $this->em->getRepository($entity)->$method($email);
        }
    }
    
    protected function getCurrentUser(){
        return $this->_currentUser;
    }
    
    protected function setRolesByUserId($userId = NULL){
        if($userId == NULL){
            return false;
        }else{
            $entity = 'Jbig3\Entity\UsersEntity';
            $method = 'getRoleNameArray';
            
            $this->_roles = $this->em->getRepository($entity)->$method($userId);
        }
    }
    
    protected function getRoles(){
        return $this->_roles;
    }
}