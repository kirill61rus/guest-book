<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Model {

    /**
     * loads the messages from the database
     * @return array  this msg and user info
     */

	function get_list() {	
	    return $this->db->join('users', 'users.id = messages.user_id')
	    				->order_by('when')
					    ->get('messages')
					    ->result_array();
	}
    /**
     * add message to db
     * @param arrau this msg and user_id
     * @return TRUE or FALSE
     */
	function add($msg) {
		$this->db->insert('messages', $msg);
	}	
	function recent_posts(){
		$this->db->select_max('msg_id');
		return $this->db->get('messages')->result_array();
	}
	function delete($msg_id){
		$this->db->where('msg_id', $msg_id);
		$this->db->delete('messages'); 
	}
	function message_by_id($msg_id){
		$this->db->where('msg_id', $msg_id);
		return $this->db->get('messages')->result_array();
	}
}