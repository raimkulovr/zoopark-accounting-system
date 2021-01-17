<?php
class BirdMap extends BaseMap{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT bird.pet_id, country_id, date_out, date_in FROM bird INNER JOIN pet ON bird.pet_id=pet.pet_id WHERE pet.pet_id = $id");
            $bird = $res->fetchObject("Bird");
            if ($bird) {
                return $bird;
            }
        }
        return new Bird();
    }
    
    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT bird.pet_id, pet.name AS name, pet.birthday AS birthday, gender.name AS gender, diet.name AS diet, habitat.name AS habitat FROM bird INNER JOIN pet ON bird.pet_id=pet.pet_id INNER JOIN gender ON pet.gender_id=gender.gender_id INNER JOIN diet ON pet.diet_id=diet.diet_id INNER JOIN habitat ON pet.habitat_id=habitat.habitat_id LIMIT $ofset, $limit");
        
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM bird");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function save(Pet $pet, Bird $bird){
        if ($pet->validate() && $bird->validate() && (new PetMap())->save($pet)) {
            
            if ($bird->pet_id == 0) {
                $bird->pet_id = $pet->pet_id;
                $bird->bird_id = $pet->pet_id;
                return $this->insert($bird);
            } else {
                return $this->update($bird);
            }
        }
        return false;
    }
    private function insert(Bird $bird){
        $date_out = $this->db->quote($bird->date_out);  
        $date_in = $this->db->quote($bird->date_in);  
        if ($this->db->exec("INSERT INTO bird(pet_id, country_id, date_out, date_in) VALUES($bird->pet_id, $bird->country_id, $date_out, $date_in)") == 1) {
            return true;
        }
        return false;
    }
    private function update(Bird $bird){
        $date_out = $this->db->quote($bird->date_out);  
        $date_in = $this->db->quote($bird->date_in);  
        if ($this->db->exec("UPDATE bird SET pet_id = $bird->pet_id, country_id = $bird->country_id, date_out=$date_out, date_in =$date_in WHERE pet_id=".$bird->pet_id) == 1) {
            return true;
        }
        return false;
    }
    public function findBirdProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT bird_country.name as country, bird.date_out, bird.date_in FROM bird INNER JOIN bird_country ON bird.country_id=bird_country.country_id WHERE bird.pet_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
            }
            return false;
    }
    public function arrCountry(){
        $res = $this->db->query("SELECT country_id as id, name as value FROM bird_country");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}