<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

	public function index(){
		$this->load->view('home');
	}

	public function signin(){
		// die('made it');
		$this->load->view('signin');
	}

	public function verify(){
		// var_dump($this->input->post());
		// die();
		$result = $this->user->validate($this->input->post());
		// var_dump($result);
		// die();
		if ($result['id'] && $result['user_level'] == 9){
			$this->session->set_userdata("id", $result['id']);
			$this->session->set_userdata("user_level", 9);
			redirect("/dashboard/admin");
		}elseif ($result['id'] && $result['user_level'] == 1){
			$this->session->set_userdata("id", $result['id']);
			$this->session->set_userdata("user_level", 1);
			redirect("/dashboard");
		}else{
			$this->session->set_flashdata("login_error", "Email/Password combo is incorrect");
			redirect("/signin");
		}
	}

	public function register(){
		// die("register");
		$this->load->view('register');
	}


}

