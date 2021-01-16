<?php
class Pet extends Table{
    public $pet_id = 0;
    public $name = '';
    public $gender_id = 0;
    public $birthday = '';
    public $diet_id = 0;
    public $habitat_id = 0;
    public $keeper_id = 0;
    public $vet_id = 0;

    function validate(){
        if (!empty($this->name) &&
            !empty($this->gender_id) &&
            !empty($this->diet_id) &&
            !empty($this->habitat_id) &&
            !empty($this->keeper_id) &&
            !empty($this->vet_id)) {
            return true;
            }
            return false;
    }
}