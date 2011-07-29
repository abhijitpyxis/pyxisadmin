<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('register'); 
        
        $username = new Zend_Form_Element_Text('username'); 
        $username->setLabel('Username') 
               ->setRequired(true) 
               ->addFilter('StripTags') 
               ->addValidator('NotEmpty'); 
        $password = new Zend_Form_Element_Password('password'); 
        $password->setLabel('Password') 
              ->setRequired(true) 
              ->addFilter('StripTags') 
              ->addValidator('NotEmpty');
        $confirmPassword = new Zend_Form_Element_Password('confirmPassword'); 
        $confirmPassword->setLabel('Confirm Password') 
              ->setRequired(true) 
              ->addFilter('StripTags') 
              ->addValidator('NotEmpty');
              
        $firstName = new Zend_Form_Element_Text('firstName'); 
        $firstName->setLabel('First Name') 
               ->setRequired(true) 
               ->addFilter('StripTags') 
               ->addValidator('NotEmpty');
        $lastName = new Zend_Form_Element_Text('lastName'); 
        $lastName->setLabel('Last Name') 
               ->setRequired(true) 
               ->addFilter('StripTags') 
               ->addValidator('NotEmpty');
        $sex = new Zend_Form_Element_Radio('sex'); 
        $sex->setLabel('Sex') 
        		->addMultiOption('male', 'Male')
        		->addMultiOption('female', 'Female')
               ->setRequired(true) 
               ->addFilter('StripTags') 
               ->addValidator('NotEmpty');
        $lastName = new Zend_Form_Element_Text('lastName'); 
        $lastName->setLabel('Last Name') 
               ->setRequired(true) 
               ->addFilter('StripTags') 
               ->addValidator('NotEmpty');
         
        $submit = new Zend_Form_Element_Submit('submit'); 
        $submit->setAttrib('id', 'submitbutton'); 
        $this->addElements(array($username,$password,$confirmPassword,$sex,$submit));
    }


}

