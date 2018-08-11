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
		<title>Admin Login | Codeigniter </title>
		<link rel="stylesheet" href="<?=base_url('admin_panel_css_js/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?=base_url('admin_panel_css_js/css/style.css')?>">
	</head>
	<body>
		<div class="container">
			<input type="hidden" id="base_url" value="<?php echo base_url(); ?>"/>
			<h2>Simple form</h2>
			<div id="mainform">
				<form id="login" method="post" action="">
					<div class="col-sm-6 cantercalssm"><span class="success" id="loginerror"></span></div>
					<div class="col-sm-6 cantercalss">
						<div class="form-group">
							<input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
						<div class="form-group">
							<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<div class="form-check">
								<label class="form-check-label">
								<input class="form-check-input" type="checkbox" id="rememberme" name="rememberme[]" value="no" onClick="checkremmeberme();"> Remember Me</label>
							</div>
						</div>
						<span class="applybutton" onclick="submitloginform();" >Login</span>
					</div>
				</form>
			</div>
		</div>
		
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/jquery-1.12.0.min.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/jquery-ui.min.js')?>"></script>	
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/bootstrap.min.js')?>"></script>	
		<script type="text/javascript" src="<?=base_url('admin_panel_css_js/js/login.js')?>"></script>
		
	</body>
</html>	