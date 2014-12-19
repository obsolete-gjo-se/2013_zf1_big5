<?php

class Jbig3_Form_Decorator_QuestionsRadio extends Zend_Form_Decorator_Abstract {
    
    private function buildStartDecorator(){
        
        $element = $this->getElement();
        $label = htmlentities($element->getLabel());
        $descriptionLong = htmlentities($element->getDescription());
        
        $xhtml = "<fieldset class=\"question\">\n";
        $xhtml .="    <legend>" . $label ."</legend>\n";
        $xhtml .="    <div class=\"type-check\">\n";
        $xhtml .="    <span>" . $descriptionLong . "</span>\n";
        $xhtml .=     $this->buildErrors();
        $xhtml .="    <ul>\n";
        $xhtml .="        <li>trifft garnicht zu (NEIN)</li>\n"; 
        
        return $xhtml;
    }  

    private function buildEndDecorator(){
    
        $xhtml = "        <li>trifft garnicht zu (NEIN)</li>\n";
        $xhtml .="    </ul>\n";
        $xhtml .="    </div>\n";
        $xhtml .="</fieldset>\n";
    
        return $xhtml;
    }
    
    private function buildRadiosDecorator(){
        
        $xhtml     = '';    
        $element = $this->getElement();
        $name = $element->getName();
        $options = $element->getMultioptions();
        $checkedValue = (array)$element->getValue();
        
        foreach ($options as $opt_value => $opt_label) {
            
            $checked = '';
            if (in_array($opt_value, $checkedValue)) {
                $checked = ' checked="checked"';
            }
            
            $list = "        <li><input type=\"radio\" name=" . $name . " value=" . $opt_value . $checked . " /></li>\n";

            $xhtml .= $list;

        }

        return $xhtml;
    
    }
    
    private function buildErrors(){
        
        $xhtml = '';
        $element  = $this->getElement();
        $messages = $element->getMessages();
        if (empty($messages)) {
            return;
        }
        
        $xhtml = "    <div class=\"errors\">";
        $xhtml .= $element->getView()->formErrors($messages);
        $xhtml .= "</div>\n";
        
        return $xhtml; 
    }
    
    public function render($content){
        
        $startDecorator = $this->buildStartDecorator();
        $radioDecorator = $this->buildRadiosDecorator();
        $endDecorator = $this->buildEndDecorator();
        
        $markup = $startDecorator
                . $radioDecorator
                . $endDecorator;
        
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