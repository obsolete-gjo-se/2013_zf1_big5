<?php

class Jbig3_Form_Elements_Radio extends Zend_Form_Element_Radio {
    
    protected $_elementname = '';

    public function __construct($elementname){
        
        $this->_elementname = new Zend_Form_Element_Radio($elementname);
        
        $this->_elementname->setMultiOptions(
                array(
                    'option 1' => 'eins', 
                    'option2' => 'zwei'
                ));
    }
}