<?php

class Jbig3_Form_Validator_EmailAddress extends Zend_Validate_EmailAddress
{
    const INVALID                = 'emailAddressInvalid';

    protected $_messageTemplates = array(
            self::INVALID            => "Email ist ungültig"
    );

    public function isValid($value)
    {
        $validator = new Zend_Validate_EmailAddress(
            array(
                'allow' => Zend_Validate_Hostname::ALLOW_DNS,
                'domain' => true,
                'mx' => true,
                'deep' => true
            ));

        if (!$validator->isValid($value)) {
            $this->_error(self::INVALID);
            return false;
        }
        return true;
    }
}