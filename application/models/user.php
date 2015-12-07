<?php
class User extends CI_Model{
    public function login_user($email, $password){
        $query = "SELECT email, first_name, last_name, id FROM users WHERE email = ? && password = ?";
        $values = array($email, $password);
        return $this->db->query($query, $values)->row_array();
    }

    public function register_user($email, $first_name, $last_name, $password){
        $query = "INSERT INTO users (email, first_name, last_name, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
        $values =  array($email, $first_name, $last_name, $password);
        $this->db->query($query, $values);
        $query = "SELECT first_name, last_name, email, id FROM users WHERE email = ?";
        return $this->db->query($query, $email)->row_array();
    }
    public function get_user_by_id($id){
        $query = "SELECT first_name, last_name FROM users WHERE id = ?";
        return $this->db->query($query, $id)->row_array();
    }
}
?>