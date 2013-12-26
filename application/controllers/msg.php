<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msg extends CI_Controller {
	/** 
	 * add message to db and makes array for ajax output message 
	 * @param post string $msg
	 * @param from db login and url avatar user who added message
	 * @return validation error or new message on page
	 */
	public function add()	{
		if ($this->session->userdata('id')){
			$this->load->library('form_validation');
			$this->set_validation_rules();
			if($this->form_validation->run()) {
				$data['msg']	 = $this->input->post('msg');
				$data['user_id'] = $this->session->userdata('id');
				$this->load->model('messages');
				$this->messages->add($data);
				$add_msg_info = $this->messages->recent_posts();

				$this->load->model('users'); 
				$user_data = $this->users->user_data($data['user_id']);
				$avatar = $user_data[0]['avatar'];
				if (!empty($avatar)){
					$avatar = base_url().URL_AVATAR.$avatar;
				} else {
					$avatar = base_url().URL_AVATAR.'no_avatar.jpg';
				}
				$ajaxMsg['close_class']	= '';		
				$ajaxMsg['login']  = htmlspecialchars($user_data[0]['login']);
				$ajaxMsg['avatar'] = 'src="'.$avatar.'"';
				$ajaxMsg['msg_id'] = $add_msg_info[0]['msg_id'];
			    $ajaxMsg['when']   = date( "Y-m-d H:i:s" );
				echo json_encode($ajaxMsg);
			} else {		
				echo validation_errors();
			}
		} else {
			echo 0;
		}
	}

	function set_validation_rules() {
		$this->form_validation->set_rules('msg', 'Message', 'trim|required|max_length[1000]|xss_clean');	
	}
	public function delete()	{ 
		$msg_id = $this->input->post('msg_id');
		$this->load->model('messages');
		$msg_data = $this->messages->message_by_id($msg_id);
		$user_id = $msg_data[0]['user_id'];
		if ($user_id == ($this->session->userdata('id'))){
			$this->messages->delete($msg_id);
		}
	}
	public function msg_list()	{
		$this->load->library('form_validation');
		$this->load->library('parser');
		$this->load->model('messages');
		$data['messages'] = $this->messages->get_list();
		$data['title']    = 'Main page';
		$this->load->view('home', $data);
	}
}
