<?php

class Application_Form_Client extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('client'); 
        $id = new Zend_Form_Element_Hidden('id'); 
        $id->addFilter('Int'); 
        $name = new Zend_Form_Element_Text('name'); 
        $name->setLabel('Name') 
               ->setRequired(true) 
               ->addFilter('StripTags') 
               ->addValidator('NotEmpty'); 
        $organization = new Zend_Form_Element_Text('organization'); 
        $organization->setLabel('Organization') 
              ->setRequired(true) 
              ->addFilter('StripTags') 
              ->addValidator('NotEmpty');
        $designation = new Zend_Form_Element_Text('designation'); 
        $designation->setLabel('Designation') 
              ->setRequired(true) 
              ->addFilter('StripTags') 
              ->addValidator('NotEmpty');
        $email = new Zend_Form_Element_Text('email'); 
        $email->setLabel('Email Address') 
              ->setRequired(true) 
              ->addFilter('StripTags') 
              ->addFilter('StringTrim') 
              ->addValidator('EmailAddress')
              ->addValidator('NotEmpty'); 
        $website = new Zend_Form_Element_Text('website'); 
        $website->setLabel('Website') 
              ->setRequired(true) 
              ->addFilter('StripTags') 
              ->addFilter('StringTrim') 
              ->addValidator('NotEmpty'); 
        $submit = new Zend_Form_Element_Submit('submit'); 
        $submit->setAttrib('id', 'submitbutton'); 
        $this->addElements(array($id, $name, $organization, $designation, $email, $website, $submit));
    }


}

