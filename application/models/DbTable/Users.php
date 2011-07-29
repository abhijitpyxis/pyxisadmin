<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';
    
	public function addUser($data) 
    { 
        
        $this->insert($data); 
    } 
    
    public function updateUser($id, $data) 
    { 
         
        $this->update($data, 'id = '. (int)$id); 
    } 
    
    public function deleteUser($id) 
    { 
        $this->delete('id =' . (int)$id); 
    }
    
    

}

