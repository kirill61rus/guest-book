<?php $attributes = array('id' => 'message'); echo form_open('msg/add', $attributes)?>

	<?php $data = array('name' => 'msg', 'id' => "msg", 'class' => 'form-control','placeholder' => 'Type your message here..', 'cols' => '72', 'rows' => '4');
	echo form_textarea($data); ?>
	<br />
	<span id='length' class="pull-right"></span>
	<input id="ajax" type="button" class= "btn btn-primary" value="Send">
<?php echo form_close()?>
