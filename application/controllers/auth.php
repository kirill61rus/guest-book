<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	/** 
	 * Encrypted pass and causes model authorization (model('user'))
	 * @param string $login
	 * @param string $password
	 * @return new page or info 'Incorrect login or password', adds to session user id
	 */
	public function index()	{
		if ($this->session->userdata('id')){
			redirect(base_url("msg/msg_list"));
		} else {
			$this->load->library('form_validation');
			$this->load->view('auth_form');
			if ($this->input->post()){
				$this->load->model('users');
				$login    = trim($this->input->post('login'));
				$password = Users::encrypt_pass($this->input->post('password'));
				if($userData = $this->users->auth($login, $password)) {
					$newdata = array('id' => $userData[0]['id']);
					$this->session->set_userdata($newdata);
					redirect(base_url());
				} else {
					$this->session->set_flashdata('item', '<div class="alert alert-danger">Incorrect login or password</div>');
					redirect(base_url());
				}
			} 
		}
	}
	/** 
	 * delete user info from SESSION
	 * @return authorization page
	 */
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}