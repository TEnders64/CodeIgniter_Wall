<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

	public function create(){
		// var_dump($this->input->post());
		// die();
		$this->user->create_user($this->input->post());
	}

	public function admin_create(){
		$this->load->view("new_user");
	}

	public function admin_dash(){
		if ($this->session->userdata("user_level") == 9){
			$users = $this->user->get_users();
			// var_dump($users);
			// die();
			$this->load->view("admin_dash", array(
				"users" => $users
				));
		}else{
			$this->session->set_flashdata("login_error", "You do not have permission to view this page.  Please log in appropriately.");
			redirect("/signin");
		}
	}

	public function user_dash(){
		if ($this->session->userdata("user_level") == null){
			$this->session->set_flashdata("login_error", "You must register or login first to view this page.");
			redirect("/signin");
		}elseif ($this->session->userdata("user_level") == 9){
			redirect("/dashboard/admin");
		}else{
			$users = $this->user->get_users();
			$this->load->view("user_dash", array(
			"users" => $users
			));
		}
	}

	public function goto_user($id){
		$user = $this->user->get($id);
		$posts = $this->post->get_posts($id);
		$comments = $this->post->get_comments($id);
		// var_dump($posts);
		// die();		
		// var_dump($comments);
		// die();
		$posts_w_comments = [];
		foreach ($posts as $post){
			$comment_array = [];
			foreach ($comments as $comment){
				if ($comment['post_id'] == $post['id']){
					$comment_array[] = $comment;
					// echo ("trying");
				}
			}
			$post['comments'] = $comment_array;
			$posts_w_comments[] = $post;
			//var_dump($post);
		}
		 // var_dump($posts_w_comments[0]);
		 // die();

		$this->load->view("user_wall", array("user" => $user,
			"posts" => $posts_w_comments));
	}

	public function admin_edit($id){
		if ($this->session->userdata("user_level") == 9){
			$user = $this->user->get($id);
			$this->load->view("edit_user", array("user" => $user));
		}else{
			$this->session->set_flashdata("access_denied", "You do not have permission to view this page.");
			redirect("/signin");
		}
	}

	public function edit(){
		$user = $this->user->get($this->session->userdata('id'));
		$this->load->view("edit_profile", array("user" => $user));
	}

	public function updateinfo($id){
		// var_dump($this->input->post());
		// var_dump($id);
		// die();
		$this->user->updateinfo($this->input->post(), $id);
	}

	public function updatepass($id){
		$this->user->updatepass($this->input->post(), $id);
	}

	public function updatedesc($id){
		$this->user->updatedesc($this->input->post(), $id);
	}

	public function destroy($id){
		$user = $this->user->get($id);
		$this->load->view('remove', array("user" => $user));
	}

	public function delete($id){
		$this->user->delete($id);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}

}