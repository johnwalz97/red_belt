<?php
class Travel extends CI_Model{
    public function get_all_travels(){
        $query = "SELECT * FROM travels";
        $travels = $this->db->query($query)->result_array();
        return $travels;
    }
    public function get_all_travelers($id){
        $query = "SELECT user_ids FROM travelers WHERE travel_id = ?";
        return $this->db->query($query, $id)->result_array();
    }
    public function add_trip($destination, $description, $start_date, $end_date, $user_id){
        $query = "INSERT INTO travels (destination, plan, start_date, end_date, created_at, updated_at, user_id) VALUES (?, ?, ?, ?, NOW(), NOW(), ?)";
        $values = array($destination, $description, $start_date, $end_date, $user_id);
        $this->db->query($query, $values);
    }
    public function get_trip($id){
        $query = "SELECT travels.destination, travels.plan, travels.start_date, travels.end_date, users.first_name, users.last_name FROM travels LEFT JOIN users ON users.id = travels.user_id WHERE travels.id = ?;";
        return $this->db->query($query, $id)->row_array();
    }
    public function join($id, $user_id){
        $query = "INSERT INTO travelers (travel_id, user_ids) VALUES (?, ?)";
        $values = array($id, $user_id);
        $this->db->query($query, $values);
    }
}
?>