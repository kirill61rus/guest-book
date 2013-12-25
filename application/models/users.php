<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	/**
     * @param string $login
     * @param string $password Encrypted pass
     * @return FALSE or authorized user info
     */

	function auth($login, $password){
		$this->db->select('id');
   		$this->db->where('login', $login);
   		$this->db->where('password', $password);
		$result = $this->db->get('users')->result_array();
		
		return (empty($result)) ? FALSE : $result;
	}

    /**
     * Save user to db 
     * @param array $user [name, ...]
     */
	function add($user) {
		$this->db->insert('users', $user);
	}

    function user_data($id) {  
        $this->db->where('id', $id);
        return $this->db->get('users')->result_array();
    }

    /**
     * checks for a login in the database,
     * @param string $login
     * @return FALSE or id user this login = $login
     */

	function get_by_login($login) {
		return $this->db->select('id')->where('login', $login)->get('users')->result_array();
	}
    function get_by_email($email) {
        return $this->db->select('id')->where('email', $email)->get('users')->result_array();
    }
	
    public static function encrypt_pass($pass) {
    	return md5($pass);
	}
        function edit($id, $user) {
        $this->db->where('id', $id);
        $this->db->update('users', $user);
    }

}