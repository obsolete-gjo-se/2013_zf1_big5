<?php

class Admin_Model_Forms_ExampleForm extends Jbig3_Form_BaseForm {
    
    protected $_formAction = '/admin/exampleform';
    protected $_formMethode = 'post';
    protected $_formId = 'FormId';
    protected $_formName = 'FormName';
    protected $_formClass = 'yform';

    protected $_elemQuestions = '';
    protected $_elemFirstname = 'firstname';
    protected $_elemSurname = 'surname';
    protected $_elemEmail = 'email';
    protected $_elemPassword = 'password';
    protected $_elemSubmit = 'submit';
    
    protected $_dgPersonal = 'personal';
    
    public function __construct($questions){
    
        $this->_elemQuestions = $questions;
        
        parent::__construct();
        
    }
    
    public function init(){
        
        $this->createForm();
        $this->createElements();
        $this->createDisplay();
        $this->createFormDecorator();
        $this->createPrefixPath();

    }
    
    private function createForm(){
        
        $this->setAction($this->_formAction);
        $this->setMethod($this->_formMethode);
        $this->addAttribs(
                array(
                    'id' => $this->_formId, 
                    'name' => $this->_formName, 
                    'class' => $this->_formClass
                ));       
    }

    private function createElements(){
        
        $this->createQuestions();
        
        $this->_elemFirstname = new Zend_Form_Element_Text($this->_elemFirstname);
        $this->_elemFirstname->setName('firstname')
            ->setLabel('Vorname')
            ->setDescription('Beschreibung Vorname')
            ->setAttribs(array(
            'size' => '20'
        ))
            ->addFilters(
                array(
                    'HtmlEntities', 
                    'StringTrim'
                ))
            ->setRequired(true)
            ->addErrorMessage('Bitte geben Sie Ihren Vornamen ein')
            ->setDecorators($this->inputdecorator());
        
        $this->_elemSurname = new Zend_Form_Element_Text($this->_elemSurname);
        $this->_elemSurname->setName('surname')
            ->setLabel('Nachname')
            ->setDescription('Beschreibung Nachname')
            ->setAttribs(array(
            'size' => '20'
        ))
            ->addFilters(
                array(
                    'HtmlEntities', 
                    'StringTrim'
                ))
            ->setRequired(true)
            ->addErrorMessage('Bitte geben Sie Ihren Nachnamen ein')
            ->setDecorators($this->inputdecorator());
        
        $this->_elemEmail = new Zend_Form_Element_Text($this->_elemEmail);
        $this->_elemEmail->setName('email')
            ->setLabel('Email')
            ->setDescription('Beschreibung Email')
            ->setAttribs(array(
            'size' => '20'
        ))
            ->addFilters(
                array(
                    'HtmlEntities', 
                    'StringTrim'
                ))
            ->setRequired(true)
            ->addValidator('EmailAddress')
            ->addErrorMessage('Bitte geben Sie Ihre gültige Email ein')
            ->setDecorators($this->inputdecorator());
        
        $this->_elemPassword = new Zend_Form_Element_Password($this->_elemPassword);
        $this->_elemPassword->setName('password')
            ->setLabel('Passwort')
            ->setDescription('Beschreibung Passwort')
            ->setAttribs(array(
            'size' => '20'
        ))
            ->addFilters(
                array(
                    'HtmlEntities', 
                    'StringTrim'
                ))
            ->setRequired(true)
            ->addErrorMessage('Bitte geben Sie Ihr Passwort ein')
            ->setDecorators($this->inputdecorator());
        
        $this->_elemSubmit = new Zend_Form_Element_Submit($this->_elemSubmit);
        $this->_elemSubmit->setName('Absenden')
            ->setValue('Absenden')
        ->setDecorators($this->buttondecorator());

    }
    
    private function createQuestions(){
    
        foreach ($this->_elemQuestions as $question){
    
            $elementRadio = new Zend_Form_Element_Radio($question->descriptionShort);
            $elementRadio
            ->setMultiOptions(array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
            ))
            ->setName($question->descriptionShort)
            ->setLabel($question->descriptionShort)
            ->setDescription($question->descriptionLong)
            ->setRequired(true)
            ->addErrorMessage('Bitte treffen Sie Ihre Auswahl')
            ->setDecorators(array('QuestionsRadio'));
    
            $this->addElement($elementRadio);
    
        }
    }

    private function createDisplay(){
        
        $this->addDisplayGroup(
                array(
                    $this->_elemFirstname, 
                    $this->_elemSurname, 
                    $this->_elemEmail, 
                    $this->_elemPassword
                ), $this->_dgPersonal, 
                array(
                    'legend' => 'Ihre Anmeldedaten'
                ));
        
        $this->addElements(array(
            $this->_elemSubmit
        ));

    }

    private function createFormDecorator(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->addDecorator('FormElements');
        $this->addDecorator('Form');
        
        $this->setDisplayGroupDecorators(array(
                'FormElements',
                array('Fieldset', array('class' => 'columnar'))
        ));
        
    }
    
    private function inputdecorator(){
    
        $inputdecorator = array(
                'ViewHelper',
                'Label',
                'Errors',
                array(
                        'HtmlTag',
                        array(
                                'tag' => 'div',
                                'class' => 'type-text'
                        )
                )
    
        );
    
        return $inputdecorator;
    }
    
    private function buttondecorator(){
    
        $buttondecorator = array(
                'ViewHelper',
                array(
                        'HtmlTag',
                        array(
                                'tag' => 'div',
                                'class' => 'type-button'
                        )
                )
    
        );
    
        return $buttondecorator;
    }
    
    private function createPrefixPath(){
        
        $this->addElementPrefixPath('Jbig3_Form_Decorator','Jbig3/Form/Decorator/', 'decorator');
    }
}