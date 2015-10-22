<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

	public function create($wall_id, $user_id){
		// var_dump($this->input->post());
		// die($id);
		$this->post->new_post($this->input->post(), $wall_id, $user_id);
	}

	public function comment($post_id, $user_id, $wall_id){
		$this->post->new_comment($this->input->post(), $post_id, $user_id, $wall_id);
	}
}