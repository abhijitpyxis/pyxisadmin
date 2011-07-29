<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $clients = new Application_Model_DbTable_Clients(); 
        $this->view->clients = $clients->fetchAll();
    }

    public function addAction()
    {
        // action body
        $form = new Application_Form_Client();
        $form->submit->setLabel('Add'); 
        $this->view->form = $form; 
        
        if ($this->getRequest()->isPost()) { 
            $formData = $this->getRequest()->getPost(); 
            if ($form->isValid($formData)) { 
                $data['name'] = $form->getValue('name'); 
                $data['organization'] = $form->getValue('organization');
                $data['designation'] = $form->getValue('designation'); 
                $data['email'] = $form->getValue('email');
                $data['website'] = $form->getValue('website'); 
                $albums = new Application_Model_DbTable_Clients(); 
                $albums->addClient($data); 
                
                $this->_helper->redirector('index'); 
            } else { 
                $form->populate($formData); 
            } 
        } 
    }

    public function editAction()
    {
        // action body
        $form = new Application_Form_Client();
        $form->submit->setLabel('Save'); 
        $this->view->form = $form; 
        
        if ($this->getRequest()->isPost()) { 
            $formData = $this->getRequest()->getPost(); 
            if ($form->isValid($formData)) { 
            	$id = (int)$form->getValue('id');
                $data['name'] = $form->getValue('name'); 
                $data['organization'] = $form->getValue('organization');
                $data['designation'] = $form->getValue('designation'); 
                $data['email'] = $form->getValue('email');
                $data['website'] = $form->getValue('website'); 
                $albums = new Application_Model_DbTable_Clients(); 
                $albums->updateClient($id,$data); 
                
                $this->_helper->redirector('index'); 
            } else { 
                $form->populate($formData); 
            } 
        }else { 
            $id = $this->_getParam('id', 0); 
            if ($id > 0) { 
                $albums = new Application_Model_DbTable_Clients();
                $form->populate($albums->getClient($id)); 
            }
         }  
    }

    public function deleteAction()
    {
        // action body
    }


}







