<?php
class Mammal extends Table{
    public $pet_id = 0;
    public $mammal_id = 0;
    
    function validate(){
        
        // if (!empty($this->pet_id)) {
            
            return true;
            //}
            
            //return false;
    }
}