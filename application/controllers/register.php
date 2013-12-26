<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('users'); 
    }
	/**
	 * if user data correct - sends it to the model
     * @param array post [name, login, password...]
     * @return register user info or repeat registretion this corect information 
     */
	public function index()	{
		if ($this->session->userdata('id')){
			redirect(base_url());
		} else {
			$this->load->library('form_validation');
			$this->load->library('user');
			if($this->user->set_validation_rules('callback_login_check', 'callback_email_check', 'required')) {
				$user['avatar']   = $this->user->upload_avatar();
				$user['username'] = $this->input->post('username');
				$user['city']     = $this->input->post('city');
				$user['age']      = $this->input->post('age');
				$user['login']    = $this->input->post('login');
				$user['email']    = $this->input->post('email');
				$user['password'] = Users::encrypt_pass($this->input->post('password'));
				$this->users->add($user);
				$this->session->set_flashdata('item', '<div class="alert alert-success">Successfully registered!</div>');
				redirect(base_url());
			} else {
				$this->load->view('register', array('title' => 'Registration'));
			}
		}
	}	
    /**
     * checks for a login in the database,
     * @param string $login
     * @return TRUE or FALSE and info  Login is busy
     */
	function login_check($str) {
		if(!$this->users->get_by_login($str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('login_check', 'Login is busy');
			return FALSE;
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
     * checks for a login in the database,
     * @param string $login
     * @return TRUE or FALSE
     */
	function login_jq_check(){
		$request_name = trim($this->input->post('login'));
		if($this->users->get_by_login($request_name)) {
			echo 'false';
		} else {
			 echo 'true';
		}
	}
    /**
     * checks for a email in the database,
     * @param string $email
     * @return TRUE or FALSE
     */
	function email_jq_check(){
		$request_email = trim($this->input->post('email'));
		if($this->users->get_by_email($request_email)) {
			echo 'false';
		} else {
			 echo 'true';
		}
	}
}