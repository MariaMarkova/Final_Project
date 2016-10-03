<?php 


?>


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Log In</title>
	
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
	
	<link rel="stylesheet" type="text/css" href="assets/css/logIn.css" />
	
	<script type="text/javascript" src="assets/js/ajax.js"></script>	
	<script type="text/javascript" src="assets/js/validateLogIn.js"></script>
	
	</head>
	<body>
	
		<div class="wrapper">
			<form class="form-signin" action="">       
		    	<h2 class="form-signin-heading">Please login</h2>
		    	
		    	<p id="error" class="error hidden">Wrong email or password!</p>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus />
				<input type="password" class="form-control" id="pass" name="password" placeholder="Password" required />    
				  
				<!--  <label class="checkbox">
		   		<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
				</label> -->
				
				<button id="btn-form" class="btn btn-lg btn-primary btn-block" type="button">Login</button>   
			</form>
		</div>
	</body>
</html>