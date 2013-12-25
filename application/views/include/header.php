<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="<?=base_url();?>js/libraries/jquery-2.0.3.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<title><?=isset($title) ? $title : 'Guest Book' ?></title>
		<link href="<?=base_url();?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="<?=base_url();?>public/bootstrap/css/justified-nav.css" rel="stylesheet"/>
		<link href="<?=base_url();?>public/bootstrap/css/signin.css" rel="stylesheet" />
		<script type="text/javascript" src="<?=base_url();?>js/libraries/jquery.validate.js"></script>
		<script type="text/javascript" src="<?=base_url();?>js/jqvalidation.js"></script>	
		<script type="text/javascript" src="<?=base_url();?>js/delete_msg.js"></script>
		<script type="text/javascript" src="<?=base_url();?>js/libraries/bootstrap.min.js"></script>

<style type="text/css">
.panel-default .delete {
	cursor: pointer;
}
</style>
	</head>
	<body>
		<div class="container">
<?php
	if ($this->session->userdata('id')){
	$this->load->view('navbar');
	}
?>	