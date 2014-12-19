<?php

class Jbig3_Form_Decorator_Radio extends Zend_Form_Decorator_Abstract {
    
    protected $_format =    '<fieldset class="question">
                            <legend>%s</legend>
                            <div class="type-check">    
            				<span>%s</span>
            				<ul>
            					<li>trifft garnicht zu (NEIN)</li>
            					<li><input type="radio" name="%s" value=1 /></li>
            					<li><input type="radio" name="%s" value=2 /></li>
            					<li><input type="radio" name="%s" value=3 /></li>
            					<li><input type="radio" name="%s" value=4 /></li>
            					<li><input type="radio" name="%s" value=5 /></li>
            					<li>trifft absolut zu (JA)</li>                            
                            </ul>
                            </div>
                            </fieldset>';
    

    public function render($content){
        
        $element = $this->getElement();
        
        $name = htmlentities($element->getFullyQualifiedName());
        $descriptionLong = htmlentities($element->getDescription());
        // $size = htmlentities($element->getAttrib('size'));
        $label = htmlentities($element->getLabel());
        
        $markup = sprintf($this->_format, $label, $descriptionLong, $name, $name, $name, $name, $name);
        
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