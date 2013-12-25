
<?php $this->load->view('include/header');
 if ($this->session->flashdata('item')) {
 echo '<div class="alert alert-success">'.($this->session->flashdata('item')).'</div>';
}
if (validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';}?>
	<div class="col-md-3"></div>
	<div class="col-sm-6">
		<?php $attributes = array('role' => 'form', 'id'=>'EditProfile', 'autocomplete' => "off");
		echo form_open_multipart('edit_profile', $attributes)?>
			<div>
				<img class="img-rounded pull-right" src=<?php echo (base_url().URL_AVATAR.(!empty($user_data[0]['avatar']) ? $user_data[0]['avatar'] : 'no_avatar.jpg'))?>>
				<br/>
				<h1>Edit profile</h1>
			</div>
			<div class="form-group">
				<label for="inputUsername">Name: </label>
				<?php $data = array('name' => 'username', 'class' => 'form-control', 'value' => $user_data[0]['username']);
				echo form_input($data); ?>
			</div>
			<div class="form-group">
				<label for="inputCity">City: </label>
				<?php $data = array('name' => 'city', 'class' => 'form-control', 'value' => $user_data[0]['city']);
				echo form_input($data); ?>
			</div>
			<div class="form-group">
				<label for="inputAge">Year of Birth (1900 - <?php echo date("Y")?>): </label>
				<?php $data = array('name' => 'age', 'class' => 'form-control', 'value' => $user_data[0]['age']);
				echo form_input($data); ?>
			</div>
			<div class="form-group">
				<label for="inputEmail">Email: </label>
				<?php $data = array('name' => 'email', 'class' => 'form-control', 'value' => $user_data[0]['email']);
				echo form_input($data); ?>
			</div>
			<div class="form-group">
			   <label for="inputPassword">Password:</label>
			   <?php $data = array('name' => 'password', 'class' => 'form-control', 'id' => 'password');
				echo form_password($data); ?>
			</div>
			<div class="form-group">
				<label for="inputRepassword">Repeat password: </label>
			   <?php $data = array('name' => 'repassword', 'class' => 'form-control');
				echo form_password($data); ?>	
			</div>
				<?php $data = array('name' => 'login', 'type' => 'hidden','value' => $user_data[0]['login']);
				echo form_input($data); ?>	
				<label>Select jpg, gif or png image for your avatar:<br></label>
				<?php echo form_upload('userfile'); ?>	
        <div class="form-actions">
			<?php $data = array('value' => 'Save the changes', 'class' => 'btn btn-primary');
			echo form_submit($data);?>
        </div>
		<?php echo form_close()?>
	</div>
<?php $this->load->view('include/footer') ?>