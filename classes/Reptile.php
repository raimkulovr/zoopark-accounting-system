<?php
class Reptile extends Table{
    public $pet_id = 0;
    public $reptile_id = 0;
    public $temperature = 0;
    public $hibernation_time = 0;
    
    function validate(){   
        if (!empty($this->temperature)&& !empty($this->hibernation_time)) 
        {
         return true;
        }
         
        return false;
    }
}