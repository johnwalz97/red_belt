<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$this->load->view('login_registration');
	}
	
	public function register(){
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha|min_length[3]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$user = $this->user->register_user($this->input->post('email'), $this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('password'));
			$this->session->set_userdata('user', $user);
			redirect("/travels/");			
		}
	}
	
	public function login(){
		$password = md5($this->input->post('password'));
		$login = $this->user->login_user($this->input->post('email'), $password);
		if (!empty($login)){
			$this->session->set_userdata('user', $login);
			redirect("/travels/");
		}
		else {
			$this->session->set_flashdata('errors', 'The login information you provided is incorrect');
			redirect("/");
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}
}