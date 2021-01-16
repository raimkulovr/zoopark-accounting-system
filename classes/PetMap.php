<?php
class PetMap extends BaseMap{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT pet_id, name, gender_id, birthday, diet_id, habitat_id, keeper_id, vet_id FROM pet WHERE pet_id = $id");
            $pet = $res->fetchObject("Pet");
            if ($pet) {
                return $pet;
            }
        }
        return new Pet();
    }
    public function arrGenders(){
        $res = $this->db->query("SELECT gender_id AS id, name AS value FROM gender");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function arrDiets(){
        $res = $this->db->query("SELECT diet_id AS id, name AS value FROM diet");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function arrHabitats(){
        $res = $this->db->query("SELECT habitat_id AS id, CONCAT(habitat.name, ' - ', characteristics.name) AS value FROM habitat INNER JOIN characteristics ON habitat.char_id=characteristics.char_id");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function arrKeepers(){
        $res = $this->db->query("SELECT keeper_id AS id, CONCAT(employee.firstname, ' ' ,employee.lastname) AS value FROM keeper INNER JOIN employee ON keeper.user_id=employee.user_id");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function arrVet(){
        $res = $this->db->query("SELECT vet_id AS id, CONCAT(employee.firstname, ' ' ,employee.lastname) AS value FROM veterinarian INNER JOIN employee ON veterinarian.user_id=employee.user_id");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save(Pet $pet){   
        if ($pet->pet_id == 0) {
            return $this->insert($pet);
        } else {
            return $this->update($pet);
        }
        
        return false;
    }
    private function insert(Pet $pet){
        $name = $this->db->quote($pet->name);
        $birthday = $this->db->quote($pet->birthday);       
        
            
        
        if ($this->db->exec("INSERT INTO pet(name, birthday, gender_id, diet_id, habitat_id, keeper_id, vet_id) "." VALUES($name, $birthday , $pet->gender_id, $pet->diet_id, $pet->habitat_id, $pet->keeper_id, $pet->vet_id)") == 1) {
            $pet->pet_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Pet $pet){
        $name = $this->db->quote($pet->name);
        $birthday = $this->db->quote($pet->birthday);  
        if ( $this->db->exec("UPDATE pet SET name = $name, birthday = $birthday, gender_id = $pet->gender_id, diet_id = $pet->diet_id, habitat_id = $pet->habitat_id, keeper_id = $pet->keeper_id, vet_id = $pet->vet_id  WHERE pet_id = ".$pet->pet_id) == 1) {
            return true;
        }
        return false;
    }
    public function findPetProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT pet.name as name, birthday, gender.name as gender, diet.name AS diet, CONCAT(habitat.name, ' - ' , characteristics.name) as habitat, keeper_id, vet_id FROM pet INNER JOIN gender ON pet.gender_id=gender.gender_id INNER JOIN diet ON pet.diet_id=diet.diet_id INNER JOIN habitat ON pet.habitat_id=habitat.habitat_id INNER JOIN characteristics ON habitat.char_id=characteristics.char_id WHERE pet.pet_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
            }
            return false;
    }
    public function findKeeperById($id){
        $res = $this->db->query("SELECT CONCAT(employee.firstname, ' ' ,employee.lastname) AS keeperName FROM keeper INNER JOIN employee ON keeper.user_id=employee.user_id WHERE keeper.keeper_id=$id");
        return $res->fetch(PDO::FETCH_OBJ);
    }
    public function findVetById($id){
        $res = $this->db->query("SELECT CONCAT(employee.firstname, ' ' ,employee.lastname) AS vetName FROM veterinarian INNER JOIN employee ON veterinarian.user_id=employee.user_id WHERE veterinarian.vet_id=$id");
        return $res->fetch(PDO::FETCH_OBJ);
    }
}