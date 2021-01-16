<?php
class MammalMap extends BaseMap{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT pet_id, mammal_id FROM mammals WHERE mammal_id = $id");
            $mammal = $res->fetchObject("Mammal");
            if ($mammal) {
                return $mammal;
            }
        }
        return new Mammal();
    }
    
    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT mammals.pet_id, pet.name AS name, pet.birthday AS birthday, gender.name AS gender, diet.name AS diet, habitat.name AS habitat FROM mammals INNER JOIN pet ON mammals.pet_id=pet.pet_id INNER JOIN gender ON pet.gender_id=gender.gender_id INNER JOIN diet ON pet.diet_id=diet.diet_id INNER JOIN habitat ON pet.habitat_id=habitat.habitat_id LIMIT $ofset, $limit");
        
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM mammals");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function save(Pet $pet, Mammal $mammal){
        if ($pet->validate() && $mammal->validate() && (new PetMap())->save($pet)) {
            
            if ($mammal->pet_id == 0) {
                $mammal->pet_id = $pet->pet_id;
                return $this->insert($mammal);
            } else {
                return $this->update($mammal);
            }
        }
        return false;
    }
    private function insert(Mammal $mammal){
        if ($this->db->exec("INSERT INTO mammals(pet_id) VALUES($mammal->pet_id)") == 1) {
            return true;
        }
        return false;
    }
    private function update(Mammal $mammal){
        if ($this->db->exec("UPDATE mammals SET pet_id = $mammal->pet_id WHERE pet_id=".$mammal->pet_id) == 1) {
            return true;
        }
        return false;
    }
    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT teacher.user_id, otdel.name AS otdel FROM teacher INNER JOIN otdel ON teacher.otdel_id=otdel.otdel_id WHERE teacher.user_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
            }
            return false;
    }
}