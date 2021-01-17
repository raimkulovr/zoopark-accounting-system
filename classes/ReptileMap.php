<?php
class reptileMap extends BaseMap{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT reptile.pet_id, temperature, hibernation_time FROM reptile INNER JOIN pet ON reptile.pet_id=pet.pet_id WHERE pet.pet_id = $id");
            $reptile = $res->fetchObject("Reptile");
            if ($reptile) {
                return $reptile;
            }
        }
        return new Reptile();
    }
    
    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT reptile.pet_id, pet.name AS name, temperature, diet.name AS diet, habitat.name AS habitat FROM reptile INNER JOIN pet ON reptile.pet_id=pet.pet_id INNER JOIN diet ON pet.diet_id=diet.diet_id INNER JOIN habitat ON pet.habitat_id=habitat.habitat_id LIMIT $ofset, $limit");
        
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM reptile");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function save(Pet $pet, Reptile $reptile){
        if ($pet->validate() && $reptile->validate() && (new PetMap())->save($pet)) {
            
            if ($reptile->pet_id == 0) {
                $reptile->pet_id = $pet->pet_id;
                $reptile->reptile_id = $pet->pet_id;
                return $this->insert($reptile);
            } else {
                return $this->update($reptile);
            }
        }
        return false;
    }
    private function insert(Reptile $reptile){
        if ($this->db->exec("INSERT INTO reptile(pet_id, temperature, hibernation_time) VALUES($reptile->pet_id, $reptile->temperature, $reptile->hibernation_time)") == 1) {
            return true;
        }
        return false;
    }
    private function update(Reptile $reptile){
        if ($this->db->exec("UPDATE reptile SET pet_id = $reptile->pet_id, temperature = $reptile->temperature, hibernation_time=$reptile->hibernation_time WHERE pet_id=".$reptile->pet_id) == 1) {
            return true;
        }
        return false;
    }
    public function findReptileProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT temperature, hibernation_time FROM reptile WHERE reptile.pet_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
            }
            return false;
    }
    
}