<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model {

	public function new_post($post, $wall_id, $user_id){
		// var_dump($post);
		// var_dump($id);
		// die();
		$query = "INSERT INTO posts (user_id, author, content, created_at, updated_at)
			VALUES (?,?,?, NOW(), NOW())";
		$values = array($wall_id, $user_id, $post['content']);

		$this->db->query($query, $values);

		redirect("/users/show/$wall_id");
	}

	public function get_posts($wall_id){
		$query = "SELECT posts.author, posts.id, CONCAT(users.first_name, ' ', users.last_name) AS full_name, posts.content, posts.created_at 
				FROM posts JOIN users ON posts.author = users.id
				WHERE posts.user_id = ?";
		$values = $wall_id;

		return $this->db->query($query, $values)->result_array();
	}

	public function new_comment($post, $post_id, $user_id, $wall_id){
		$query = "INSERT INTO comments (user_id, post_id, author, content, created_at, updated_at)
			VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($wall_id, $post_id, $user_id, $post['content']);

		$this->db->query($query, $values);

		redirect("/users/show/$wall_id");
	}

	public function get_comments($wall_id){
		$query = "SELECT comments.author, comments.post_id, CONCAT(users.first_name, ' ', users.last_name) AS full_name, comments.content, comments.created_at
				FROM comments JOIN users ON comments.author = users.id
				WHERE comments.user_id = ?";
		$values = $wall_id;

		return $this->db->query($query, $values)->result_array();

	}

}