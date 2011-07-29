<?php

class Application_Model_DbTable_Clients extends Zend_Db_Table_Abstract
{

    protected $_name = 'clients';
    
    public function getClient($id) 
    { 
        $id = (int)$id; 
        $row = $this->fetchRow('id = ' . $id); 
        if (!$row) { 
            throw new Exception("Could not find row $id"); 
        } 
        return $row->toArray();    
    } 
    
    public function addClient($data) 
    { 
         
        $this->insert($data); 
    } 
    
    public function updateClient($id, $data) 
    { 
         
        $this->update($data, 'id = '. (int)$id); 
    } 
    
    public function deleteClient($id) 
    { 
        $this->delete('id =' . (int)$id); 
    }


}

