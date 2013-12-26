<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_profile extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('users'); 
    }
	/**
     * @param array post [name, login, password...]
     * @return edit user info in db  
     */
	public function index()	{ 
		$id = $this->session->userdata('id');
		if ($id){
			$user_data = $this->users->user_data($id);
			$this->load->library('form_validation');
			$this->load->library('user');

			if ($user_data[0]['email'] == $this->input->post('email')){
				$callback_email_check = '';
			} else {
				$callback_email_check = 'callback_email_check';
			}
			if($this->user->set_validation_rules('', $callback_email_check, '')) {
				$user['avatar']   = $this->user->upload_avatar();
				$user['username'] = $this->input->post('username');
				$user['city']     = $this->input->post('city');
				$user['age']      = $this->input->post('age');
				$user['email']    = $this->input->post('email');
				if ($this->input->post('password') != 0) {
					$user['password'] = Users::encrypt_pass($this->input->post('password'));
				} else {$user['password'] = $this->input->post('password');}
				$user = array_filter($user);
				$this->users->edit($id, $user);
				$this->session->set_flashdata('item', 'User data changed!');
				redirect(base_url("edit_profile"));
			} else {
				$this->load->view('edit_profile', array('user_data' => $user_data));
			}
		} else {
			redirect(base_url());
		}
	}	

    /**
     * checks for a email in the database,
     * @param string $email
     * @return TRUE or FALSE and info  email is busy
     */
	function email_check($str) {
		if(!$this->users->get_by_email($str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('email_check', 'E-mail is busy');
			return FALSE;
		}
	}

    /**
     * checks for a email in the database,
     * @param string $email
     * @return TRUE or FALSE
     */
	function email_jq_check(){
		$id = $this->session->userdata('id');
		$user_data = $this->users->user_data($id);
		$request_email = trim($this->input->post('email'));
		if ($request_email == $user_data[0]['email']){
			echo 'true';
		} else {
			if($this->users->get_by_email($request_email)) {
				echo 'false';
			} else {
				 echo 'true';
			}
		}
	}
}	
