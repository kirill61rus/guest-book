<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class User { 
    /**
     * resize and rename page
     * @param url page
     * @return page this naw name and size 
     */
	function upload_avatar() {
		$config['upload_path']   = './'.URL_AVATAR;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']		 = 1500;
		$config['encrypt_name']  = TRUE;

		$CI =& get_instance();
		$CI->load->library('upload', $config);
		$CI->upload->do_upload();
		$image_data = $CI->upload->data();

		$config = array(
			'image_library'  => 'gd2',
			'source_image'   => $image_data['full_path'],   
			'new_image' 	 => APPPATH.'../'.URL_AVATAR,
			'maintain_ratio' => TRUE, 
			'width' 		 => 150,
			'height' 		 => 150
		);

		$CI->load->library('image_lib', $config);
		$CI->image_lib->resize();

		return $image_data['file_name'];
	}
    /**
     * validates user data
     * @param user data 
     * @return TRUE or FALSE 
     */
	function set_validation_rules($login_check, $email_check, $required) {
		$CI =& get_instance();
		$CI->form_validation->set_rules('username', 'Name',  'required|trim|max_length[30]');	
		$CI->form_validation->set_rules('city', 'City',  'required|trim|max_length[30]');
		$CI->form_validation->set_rules('age', 'Year of Birth',  'required|trim|greater_than[1900]|less_than[' . date('Y') . ']');	
		$CI->form_validation->set_rules('login', 'Login', 'required|trim|max_length[100]|'.$login_check);
		$CI->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|'.$email_check);	
		$CI->form_validation->set_rules('password', 'Password',  $required.'|min_length[6]');
		$CI->form_validation->set_rules('repassword', 'Repassword', 'matches[password]');	

		if($CI->form_validation->run()) {
			return TRUE;
		} else{
			return FALSE;
		}
	}
}
