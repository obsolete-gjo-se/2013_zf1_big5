<?php

class Admin_Model_Forms_RolesForm extends Jbig3_Form_BaseForm {
    
    public function __construct(Doctrine\ORM\EntityManager $em, $options = null){
        
        parent::__construct($em,$options);

        
        // TODO Zend_Form RF
        $name = new Zend_Form_Element_Text('name');
        $name->setAttrib('size', 28)
            ->setLabel("Role Name")
            ->setRequired(true)
            ->addErrorMessage("A Role name is required");
        $this->addElement($name);
        
        $parentRole = new Admin_Model_Forms_RolesSelectForm('parentRole', $this->_em);
        $parentRole->setLabel("Parent Role");
        $this->addElement($parentRole);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Create Role")->setRequired(true);
        $this->addElement($submit);
    }
}