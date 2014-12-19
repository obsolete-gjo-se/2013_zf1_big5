<?php

class Jbig3_Form_Decorator_Input extends Zend_Form_Decorator_Abstract {
    
    protected $_format = '<input id="%s" name="%s" type="text" value="%s"/>';
    
    // protected $_format =    '<div class="%s">    
//                             <span>%s</span>
//                             <label for="%s">%s</label>
//                             <input type="text" name="%s" id="%s" size="%s" value="%s" />
//                             </div>';
    

    public function render($content){
        
        $element = $this->getElement();
        $name = htmlentities($element->getFullyQualifiedName());
        $id = htmlentities($element->getId());
        $value = htmlentities($element->getValue());
        
        $markup = sprintf($this->_format, $id, $name, $value);
        
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