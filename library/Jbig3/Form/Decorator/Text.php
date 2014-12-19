<?php

class Jbig3_Form_Decorator_Text extends Zend_Form_Decorator_Abstract {
    
    // protected $_format = '<input id="%s" name="%s" type="text" value="%s"/>';
    
    protected $_format =    '<div class="type-text">    
                            <span>%s</span>
                            <label for="%s">%s</label>
                            <input type="text" name="%s" id="%s" size="%s" value="%s" />
                            </div>';
    

    public function render($content){
        
        $element = $this->getElement();
        
        $errormsg = $element->getErrorMessages();
        $id = htmlentities($element->getId());
        $label = htmlentities($element->getLabel());
        $name = htmlentities($element->getFullyQualifiedName());
        $size = htmlentities($element->getAttrib('size'));
        $value = htmlentities($element->getValue());
        
        $markup = sprintf($this->_format, $errormsg, $id, $label, $name, $id, $size, $value);
        
        $placement = $this->getPlacement();
        $separator = $this->getSeparator();
        switch ($placement) {
            case self::PREPEND:
                return $markup . $separator . $content;
            case self::APPEND:
            default:
                return $content . $separator . $markup;
        }
    
    }
}