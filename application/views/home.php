<?php $this->load->view('include/header') ?>


<?php
	if ($this->session->userdata('id')){
		$this->load->view('showmsg');
		$this->load->view('add_message');
	} else {
		$this->load->view('auth_form');
	}
?>
<?php $this->load->view('include/footer') ?>