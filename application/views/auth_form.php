<?php  $this->load->view('include/header');
$attributes = array('class' => 'form-signin', 'OnSubmit' => 'return authValidate(this);'); echo form_open('login', $attributes);
?>
	<?php $this->flash->show() ?>
    <h2 class="form-signin-heading">Please sign in</h2>	

	<?php $data = array('name' => 'login', 'required' => 'true', 'class' => 'form-control','placeholder' => 'Login', 'autofocus' => 'true');
	echo form_input($data); ?>

	<?php $data = array('name' => 'password', 'required' => 'true', 'class' => 'form-control','placeholder' => 'password');
	echo form_password($data); ?>

	<?php $data = array('value' => 'Sign in', 'class' => 'btn btn-primary');
	echo form_submit($data);?>

   	<a href="<?php echo base_url("profile/registration")?>">Register</a>
<?php echo form_close();
$this->load->view('include/footer'); ?>


