<?php $this->load->view('include/header');
if (validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';}?>
	<div class="col-md-3"></div>
	<div class="col-sm-6">
		<?php $attributes = array('role' => 'form', 'id'=>'RegisterForm', 'autocomplete' => "off");
		 echo form_open_multipart('profile/registration', $attributes)?>
			<h1>Registration</h1>
			<div class="form-group">
				<label for="inputUsername">Name: </label>
				<?php $data = array('name' => 'username', 'required' => 'true', 'class' => 'form-control','value' => set_value('username'));
				echo form_input($data); ?>
			</div>
			<div class="form-group">
				<label for="inputCity">City: </label>	
				<?php $data = array('name' => 'city', 'required' => 'true', 'class' => 'form-control','value' => set_value('city'));
				echo form_input($data); ?>
			</div>	
			<div class="form-group">
				<label for="inputAge">Year of Birth (1900 - <?php echo date("Y")?>): </label>
				<?php $data = array('name' => 'age', 'required' => 'true', 'class' => 'form-control','value' => set_value('age'));
				echo form_input($data); ?>	
			</div>
			<div class="form-group">
				<label for="inputLogin">Login: </label>
				<?php echo form_input(array('name' => 'login', 'required' => 'true', 'class' => 'form-control','value' => set_value('login'))); ?>
			</div>
			<div class="form-group">	
				<label for="inputEmail">Email: </label>
				<?php $data = array('name' => 'email', 'required' => 'true', 'class' => 'form-control','value' => set_value('email'));
				echo form_input($data); ?>
			</div>
			<div class="form-group">	
			   <label for="inputPassword">Password:</label>
			   <?php $data = array('name' => 'password', 'required' => 'true', 'id' => 'password', 'class' => 'form-control');
				echo form_password($data); ?>
				</div>
			<div class="form-group">	
			   <label for="inputRepassword">Repeat password: </label>
			   <?php $data = array('name' => 'repassword', 'required' => 'true', 'class' => 'form-control');
				echo form_password($data); ?>
			</div>	
				<label>Select jpg, gif or png image for your avatar:<br></label>
				<?php echo form_upload('userfile'); ?>	
			
			<?php $data = array('value' => 'Sign up', 'class' => 'btn btn-primary');
			echo form_submit($data);?>
			<a href='<?php echo base_url()?>'>Authorization</a>
		<?php echo form_close()?>
	</div>
<?php $this->load->view('include/footer') ?>