<?php
class Bird extends Table{
    public $pet_id = 0;
    public $bird = 0;
    public $country_id = 0;
    public $date_out = ' ';
    public $date_in = ' ';
    function validate(){
        
        // if (!empty($this->country_id)&&
        //     !empty($this->date_out)&&
        //     !empty($this->date_in)
        //     ) 
        // {
            return true;
        // }
            
        // return false;
    }
}