<?php
$this->load->view('partials/head', ['title' => 'Login/Registration']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
if(!empty(validation_errors())){
	$display = '';
	$login = 'none';
	$register = '';
} else {
	$display = 'none';
	$login = '';
	$register = 'none';
}
if(!empty($this->session->flashdata('errors'))){
	$display_log = '';
} else {
	$display_log = 'none';
}
?>
<div class="page-header" style="text-align: center;">
	<h1>Welcome!</h1>
</div>
<div class="container login" style="display: <?=$login?>">
	<div id="loginbox" style="margin-top: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 sol-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Sign In</div>
			</div>
			<div style="padding-top: 30px;" class="panel-body">
				<div style="display: <?=$display_log?>" id="login-alert" class="alert alert-danger col-sm-12"><?=$this->session->flashdata('errors')?></div>
				<form id="loginform" class="form-horizontal" role="form" action="/welcome/login" method="post">
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="login-username" type="email" class="form-control" placeholder="Email" name="email" required>
					</div>
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="login-password" class="form-control" type="password" placeholder="Password" name="password" required>
					</div>
					<div class="col-sm-12 controls">
						<input id="btn-login" class="btn btn-info" type="submit" value="Sign-In">
					</div>
				</form>
			</div>
		</div>
	</div>
	<p><a href="#" style="float: right" onclick="$('.login').hide(); $('.register').show()">Don't have an account? Register!</a></p>
</div>


<div class="container register" style="display: <?=$register?>">
	<p><a href="#" style="float: right;" onclick="$('.register').hide(); $('.login').show()">Already have an account? Login!</a></p>
	<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Register</div>
			</div>  
			<div class="panel-body" >
				<form id="signupform" class="form-horizontal" role="form" action="/welcome/register" method="post">
					<div id="signupalert" style="display:<?=$display?>" class="alert alert-danger">
						<p><?=validation_errors()?></p>
						<span></span>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" placeholder="Email Address">
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-md-3 control-label">First Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="first_name" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-md-3 control-label">Last Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="last_name" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Confirm Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="passconf" placeholder="Confirm Password">
						</div>
					</div>
					<div class="form-group">
						<!-- Button -->                                        
						<div class="col-md-offset-3 col-md-9">
							<input id="btn-signup" type="submit" class="btn btn-info" value="Sign Up">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>