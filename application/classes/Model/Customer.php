<?php

class Model_Customer extends Kohana_Model {
	
	

	public $nazwa;

	public $nip;

	public $regon;

	public $kod_firmy;

	
	// association with Adres class
	
	// association with Cennik class
	
	// association with Dzial class
	
	// association with Magazyn class
	
	// association with Faktura class
	
	// association with Administrator class
	
	public function rules()
    {
        return array(
            'nazwa' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 64)),
                array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
            ),
            'nip' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 13)),
                array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
            ),
            'regon' => array(
                array('not_empty'),
                array('min_length', array(':value', 9)),
                array('max_length', array(':value', 14)),
                array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
            ),
            'kod_firmy' => array(
                array('not_empty'),
                array('min_length', array(':value', 32)),
                array('max_length', array(':value', 32)),
            ),
        );
    }
	
	public function add($page_data){
        $result = DB::insert('firma',array_keys($page_data))
                    ->values($page_data)
                    ->execute();        
        return $result;
    }
    
    public function getList($pagination)
    {
        $result = DB::select('*')
                    ->from('firma')
                    ->limit($pagination->items_per_page)
                    ->offset($pagination->offset)
                    ->execute()
                    ->as_array();
        return $result;
    }
    
    public function getListFirma()
    {
        $result = DB::select('*')
                    ->from('firma')
                    ->execute()
                    ->as_array();
        return $result;
    }
    
    public function get($id)
    {
        $result = DB::select('*')
                    ->from('firma')
                    ->where('id', '=', $id)
                    ->execute()
                    ->current();
        
        return $result;
    }
    
    public function count(){
        $result = DB::select('*')
                    ->from('firma')
                    ->execute()
                    ->count();
        
        return $result;        
    }
    
    public function update($id,$customer){
        $result = DB::update('firma')
                    ->set($customer)
                    ->where('id', '=', $id)
                    ->execute();
        
        return $result;
    }
    
    public function delete($id){
        $result = DB::delete('firma')
                    ->where('id', '=', $id)
                    ->execute();       
    }
}


?>
