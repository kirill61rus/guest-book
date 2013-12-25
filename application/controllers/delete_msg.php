<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_msg extends CI_Controller {
		public function index()	{ 
			$msg_id = $this->input->post('msg_id');
			$this->load->model('messages');
			$msg_data = $this->messages->message_by_id($msg_id);
			$user_id = $msg_data[0]['user_id'];
			if ($user_id == ($this->session->userdata('id'))){
				$this->messages->delete($msg_id);
			}
		}
}