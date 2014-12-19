<?php

class Jbig3_Form_Elements_Text extends Zend_Form_Element_Text {
    
    protected $_elementname = '';

    public function __construct($elementname){
        
        $this->_elementname = new Zend_Form_Element_Text($elementname);
        return $this;
        
        
    }
}