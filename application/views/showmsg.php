<?php  $this->load->view('include/header'); ?>
<div id='commentBlock'>
	<?php 
		foreach($messages as $item){
			echo $this->parser->parse('templates/message_block', [
				'login' => htmlspecialchars($item['login']),
				'avatar' => 'src="'.base_url().URL_AVATAR.(!empty($item['avatar']) ? $item['avatar'] : 'no_avatar.jpg').'"',
				'when' => $item['when'],
				'msg' => $item['msg'],
				'id' => $item['id'],
				'msg_id' => $item['msg_id'],
				'close_class' => ($item['id'] == $this->session->userdata('id') ? '' : 'hidden')
			], TRUE);
		}
	?>
</div>

<div style="display: none" id="message_block">
	<?php $this->load->view('templates/message_block') ?>
</div>
<?php $this->load->view('templates/confirm') ?>