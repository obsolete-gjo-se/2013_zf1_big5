<?php

class Jbig3_Form_Decorator_Submit extends Zend_Form_Decorator_Abstract {
    
    protected $_format =    '<div class="type-button">
                 		     <input type="submit" value="%s" class="%s" id="%s" name="%s" />
                 		     </div>';
    

    public function render($content){
        
        $element = $this->getElement();
        
        $value = htmlentities($element->getValue());
        $class = htmlentities($element->getAttrib('class'));
        $id = htmlentities($element->getId());
        $name = htmlentities($element->getFullyQualifiedName());
        
        
        $markup = sprintf($this->_format, $value, $class, $id, $name);
        
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