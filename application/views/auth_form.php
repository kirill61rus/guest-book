<?php $attributes = array('class' => 'form-signin', 'OnSubmit' => 'return authValidate(this);'); echo form_open('auth', $attributes)?>
 <?php if ($this->session->flashdata('item')) {
 echo ($this->session->flashdata('item'));} ?>
    <h2 class="form-signin-heading">Please sign in</h2>	

	<?php $data = array('name' => 'login', 'required' => 'true', 'class' => 'form-control','placeholder' => 'Login', 'autofocus' => 'true');
	echo form_input($data); ?>

	<?php $data = array('name' => 'password', 'required' => 'true', 'class' => 'form-control','placeholder' => 'password');
	echo form_password($data); ?>

	<?php $data = array('value' => 'Sign in', 'class' => 'btn btn-primary');
	echo form_submit($data);?>

   	<a href="<?php echo base_url("user_profile/registration")?>">Register</a>
<?php echo form_close()?>


