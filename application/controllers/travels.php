<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends CI_Controller{
    public function index(){
       if(empty($this->session->userdata('user'))){
            redirect("/");
        }
        else{
            $return = $this->travel->get_all_travels();
            $travels = array();
            $other_travels = array();
            foreach($return as $trip){
                $return1 = $this->travel->get_all_travelers($trip['id']);
                $set = false;
                foreach($return1 as $returned){
                    if(in_array($this->session->userdata('user')['id'], $returned)){
                        $set = true;
                    }
                }
                if($trip['user_id'] == $this->session->userdata('user')['id'] || $set){
                    array_push($travels, $trip);
                }
                else  {
                    $trip['user'] = $this->user->get_user_by_id($trip['user_id']);
                    array_push($other_travels, $trip);
                }
            }
             $this->load->view('travels', ['travels' => $travels, 'other_travels' => $other_travels]);
        }
    }
    public function add(){
        if(empty($this->session->userdata('user'))){
            redirect("/");
        }
        else {
            $this->load->view('add');
        }
    }
    public function create(){
        if(empty($this->session->userdata('user'))){
            redirect("/");
        }
        else {
            $this->form_validation->set_rules('destination', 'Destination', 'required|max_length[45]');
            $this->form_validation->set_rules('description', 'Description', 'required|max_length[255]');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required|callback_date_check');
            $this->form_validation->set_rules('end_date', 'End Date', 'required|callback_end_date_check');
            if ($this->form_validation->run() == FALSE){
                $this->add();
            }
            else{
                $destination = $this->input->post('destination');
                $description = $this->input->post('description');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
                $this->travel->add_trip($destination, $description, $start_date, $end_date, $this->session->userdata('user')['id']);
                redirect("/travels/");	
            }
        }
    }
    public function join($id){
        if(empty($this->session->userdata('user'))){
            redirect("/");
        }
        else {
            $this->travel->join($id, $this->session->userdata('user')['id']);
            redirect("/travels/");
        }
    }
    public function destination($id){
        if(empty($this->session->userdata('user'))){
            redirect("/");
        }
        else {
            $trip = $this->travel->get_trip($id);
            $travelers = $this->travel->get_all_travelers($id);
            $others = array();
            foreach($travelers as $traveler){
                array_push($others, $this->user->get_user_by_id($traveler['user_ids']));
            }
            $this->load->view('destination', ['trip' => $trip, 'others' => $others]);
        }
    }
	public function date_check($str){
        $check = explode('-', $str);
        $result = true;
        if ($check[0] < date('Y')) {
            $result = false;
        }
        elseif ($check[1] < date('n')) {
            $result = false;
        }
        elseif ($check[2] < date('j')){
            $result = false;
        }
        if ($result == false){
            $this->form_validation->set_message('date_check', 'The %s cannot be in the past.');
        }
        return $result;
	}
    public function end_date_check($str){
        $check = explode('-', $str);
        $start = explode('-', $this->input->post('start_date'));
        $result = true;
        if ($check[0] < $start[0]) {
            $result = false;
        }
        elseif ($check[1] < $start[1]) {
            $result = false;
        }
        elseif ($check[2] < $start[2]){
            $result = false;
        }
        if ($result == false){
            $this->form_validation->set_message('end_date_check', 'The %s cannot be earlier than the start date!');
        }
        return $result;
    }
}
?>