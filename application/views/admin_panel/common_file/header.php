<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html xmlns="http://www.w3.org/1999/xhtml" class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>    <html xmlns="http://www.w3.org/1999/xhtml" class="ie ie7"> <![endif]-->
<!--[if IE 8 ]>    <html xmlns="http://www.w3.org/1999/xhtml" class="ie ie8"> <![endif]-->
<!--[if IE 9 ]>    <html xmlns="http://www.w3.org/1999/xhtml" class="ie ie9"> <![endif]-->
<html>
	<head>
		<meta charset="utf-8">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Codeigniter</title>
		<link rel="stylesheet" href="<?=base_url('admin_panel_css_js/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?=base_url('admin_panel_css_js/css/style.css')?>">
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/jquery-1.12.0.min.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/jquery-ui.min.js')?>"></script>	
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/bootstrap.min.js')?>"></script>	
	</head>
	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
		<ul>
			<li>
				<a class="nav-link" href="<?php echo base_url();?>admin_panel/question">Question</a>
			</li>
			<li>
				<a class="nav-link" data-toggle="modal" data-target="#exampleModal">Logout</a>
			</li>
		<input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
		