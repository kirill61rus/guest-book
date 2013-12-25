<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->library('parser');
		$this->load->model('messages');
		$data['messages'] = $this->messages->get_list();
		$data['title']    = 'Main page';
		$this->load->view('home', $data);
	}
}