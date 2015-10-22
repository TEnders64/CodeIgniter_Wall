<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function create_user($post){

		$this->form_validation->set_rules("email", "email", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("first_name", "first_name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "last_name", "trim|required|alpha");
		$this->form_validation->set_rules("password", "password", "trim|required|alpha_numeric|min_length[6]");
		$this->form_validation->set_rules("c_password", "confirmation", "trim|required|matches[password]");
		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("errors", validation_errors());
		    redirect("/register");
		}
		else
		{
			$query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at)
				VALUES (?,?,?,?, 1, NOW(), NOW())";
			$values = array($post['first_name'], $post['last_name'], $post['email'], $post['password']);

			$this->db->query($query, $values);

			if ($this->session->userdata("user_level") == 1){
				redirect("/");
			}elseif ($this->session->userdata("user_level") == 9){
				redirect("/dashboard/admin");
			}
		}

	}

	public function get($id){
		$query = "SELECT id, first_name,last_name, email, user_level, created_at, description FROM users
			WHERE id = ?";
		$values = $id;

		return $this->db->query($query, $values)->row_array();
	}

	public function get_users(){
		$query = "SELECT id, CONCAT(first_name, ' ',last_name) AS full_name, email, created_at, user_level FROM users";
		return $this->db->query($query)->result_array();
	}

	public function validate($post){
		// var_dump($post);
		// die();
		$query = "SELECT id, user_level FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'], $post['password']);
		return $this->db->query($query, $values)->row_array();
	}

	public function updateinfo($post, $id){

		$this->form_validation->set_rules("email", "email", "trim|required|valid_email");
		$this->form_validation->set_rules("first_name", "first_name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "last_name", "trim|required|alpha");

		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("errors", validation_errors());
			
			if($this->session->userdata("user_level") == 9){
		    	redirect("/users/edit/$id");
		    }else{
		    	redirect("/users/edit");
		    }
		}
		else
		{
			$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_level = ?, updated_at = NOW()
					WHERE id = ?";
			$values = array($post['first_name'], $post['last_name'], $post['email'], $post['user_level'], $id);

			$this->db->query($query, $values);
			$this->session->set_flashdata("success", "Contact information updated!");

			if($this->session->userdata("user_level") == 9){
				redirect("/dashboard/admin");
		    }else{
		    	redirect("/dashboard");
		    }
		}
	}

	public function updatepass($post, $id){
		$this->form_validation->set_rules("password", "password", "trim|required|alpha_numeric|min_length[6]");
		$this->form_validation->set_rules("c_password", "confirmation", "trim|required|matches[password]");
		
		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("errors", validation_errors());
			
			if($this->session->userdata("user_level") == 9){
		    	redirect("/users/edit/$id");
		    }else{
		    	redirect("/users/edit");
		    }
		}
		else
		{
			$query = "UPDATE users SET password = ? WHERE id = ?";
			$values = array($post['password'], $id);

			$this->db->query($query, $values);
			$this->session->set_flashdata("success", "Password updated!");
			
			if($this->session->userdata("user_level") == 9){
				redirect("/dashboard/admin");
		    }else{
		    	redirect("/dashboard");
		    }
		}
	}

	public function updatedesc($post, $id){
		$this->form_validation->set_rules("description", "description", "trim|required");
		
		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("errors", validation_errors());
			
			if($this->session->userdata("user_level") == 9){
		    	redirect("/users/edit/$id");
		    }else{
		    	redirect("/users/edit");
		    }
		}
		else
		{
			$query = "UPDATE users SET description = ? WHERE id = ?";
			$values = array($post['description'], $id);

			$this->db->query($query, $values);
			$this->session->set_flashdata("success", "Description updated!");
			
			if($this->session->userdata("user_level") == 9){
				redirect("/dashboard/admin");
		    }else{
		    	redirect("/dashboard");
		    }
		}
	}

	public function delete($id){
		$query = "DELETE FROM users WHERE id = ?";
		$values = $id;

		$this->db->query($query, $values);
		redirect("/dashboard/admin");
	}
}