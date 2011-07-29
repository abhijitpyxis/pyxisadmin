<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
	    $form = new Application_Form_Login();
	    $request = $this->getRequest();
	    if ($request->isPost()) {
	        if ($form->isValid($request->getPost())) {
	            if ($this->_process($form->getValues())) {
	                // We're authenticated! Redirect to the home page
	                $this->_helper->redirector('index', 'index');
	            }
	        }
	    }
	    $this->view->form = $form;
    }

    protected function _process($values)
    {
        // Get our authentication adapter and check credentials
                        $adapter = $this->_getAuthAdapter();
                        $adapter->setIdentity($values['username']); 
                        $adapter->setCredential($values['password']);
                
                        $auth = Zend_Auth::getInstance();
                        $result = $auth->authenticate($adapter);
                        if ($result->isValid()) {
                            $user = $adapter->getResultRowObject();
                            $auth->getStorage()->write($user);
                            return true;
                        }
                        return false;
    }

    protected function _getAuthAdapter()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                        
                        $authAdapter->setTableName('users')
                            ->setIdentityColumn('username')
                            ->setCredentialColumn('password')
                            ->setCredentialTreatment('SHA1(CONCAT(?,salt))');
                            
                        
                        return $authAdapter;
    }

    public function logoutAction()
    {
        // action body
                Zend_Auth::getInstance()->clearIdentity();
                $this->_helper->redirector('index'); // back to login page
    }

    public function registerAction()
    {
        // action body
        $form = new Application_Form_Register();
        if ($this->getRequest()->isPost()) { 
            $formData = $this->getRequest()->getPost(); 
            if ($form->isValid($formData)) {
            	if($form->getValue('password') == $form->getValue('confirmPassword')){
            		$pw = $form->getValue('password').'ce8d96d579d389e783f95b3772785783ea1a9854';
            		$pwd = SHA1($pw);
            		
            		$data['salt'] = 'ce8d96d579d389e783f95b3772785783ea1a9854';
            		$data['username'] = $form->getValue('username'); 
	                $data['password'] = $pwd; 
	                $albums = new Application_Model_DbTable_Users(); 
	                $albums->addUser($data); 
	                
	                $this->_helper->redirector('index');
            	} 
                 
            } else { 
                $form->populate($formData); 
            } 
        }
        $this->view->form = $form;
        
    }


}





