<?php
class EmployeeMap extends BaseMap{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT employee_id, name, gender_id, birthday, diet_id, habitat_id, keeper_id, vet_id FROM employee WHERE employee_id = $id");
            $employee = $res->fetchObject("employee");
            if ($employee) {
                return $employee;
            }
        }
    }
    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT * FROM employee LIMIT $ofset, $limit");
        
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function findAllFamilys($ofset=0, $limit=30){
        $res = $this->db->query("SELECT * FROM employee WHERE spouse IS NOT NULL LIMIT $ofset, $limit");
        
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM employee");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
}