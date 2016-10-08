<?php 

namespace View;

class ProfileView
{
	private $adminFirstName;
	private $adminLastName;
	private $adminUsername;
	private $adminEmail;
	private $adminTel;
	
	public function __construct($firstName, $lastName, $username, $email, $tel){
		$this->adminFirstName = $firstName;
		$this->adminLastName = $lastName;
		$this->adminUsername = $username;
		$this->adminEmail = $email;
		$this->adminTel = $tel;
	}
	
	public function renderProfileForm(){
// 		echo '<!DOCTYPE html>
// 				<html lang="en">
				
// 				<head>
				
// 				    <meta charset="utf-8">
// 				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
// 				    <meta name="viewport" content="width=device-width, initial-scale=1">
// 				    <meta name="description" content="">
// 				    <meta name="author" content="">
				
// 				    <title>Prevozvach</title>
				
// 				    <!-- Bootstrap Core CSS -->
// 				    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
				
// 				    <!-- Custom CSS -->
// 				    <link href="assets/css/sb-admin.css" rel="stylesheet">
				
// 				 	<!-- Custom CSS -->
// 				    <link href="assets/css/search.css" rel="stylesheet">
				    
// 				    <!-- Custom Fonts -->
// 				    <link href="assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
				
// 					<!-- profile -->
// 					<link rel="stylesheet" type="text/css" href="assets/css/personalInfo.css" />
				
// 					<!--JS -->
// 					<script type="text/javascript" src="assets/js/ajax.js"></script>
// 					<script type="text/javascript" src="assets/js/changePersonalInfo.js"></script>
// 					<link rel="stylesheet" type="text/css" href="assets/css/logIn.css" />
// 				</head>
				
// 				<body>
				
// 				    <div id="wrapper">
				
// 				        <!-- Navigation -->
// 				        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
// 				            <!-- Brand and toggle get grouped for better mobile display -->
// 				            <div class="navbar-header">
// 				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
// 				                    <span class="sr-only">Toggle navigation</span>
// 				                    <span class="icon-bar"></span>
// 				                    <span class="icon-bar"></span>
// 				                    <span class="icon-bar"></span>
// 				                </button>
// 				                <a class="navbar-brand" href="index.php">Prevozvach</a>
// 				            </div>
// 				            <!-- Top Menu Items -->
// 				            <ul class="nav navbar-right top-nav">
				               
// 				                <li class="dropdown">
// 				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> ' .
// 										$this->adminFirstName
// 									. ' <b class="caret"></b></a>
// 				                    <ul class="dropdown-menu">
// 				                        <li>
// 				                            <a href="viewprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
// 				                        </li>
// 				                        <li class="divider"></li>
// 				                        <li>
// 				                            <a href="index.php?controller=login&action=showLoginForm"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
// 				                        </li>
// 				                    </ul>
// 				                </li>
// 				            </ul>
// 				            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
// 				            <div class="collapse navbar-collapse navbar-ex1-collapse">
// 				                <ul class="nav navbar-nav side-nav">
				                    
// 				                    <li class="active">
// 				                        <a href="index.php?controller=base&action=showBaseView"><i class="fa fa-fw fa-home"></i> Home</a>
// 				                    </li>
// 				                    <li>
// 				                        <a href="#"><i class="fa fa-fw fa-edit"></i> Add Post</a>
// 				                    </li>
// 				                    <li>
// 				                        <a href="#"><i class="fa fa-fw fa-desktop"></i> View Posts</a>
// 				                    </li>
// 				                </ul>
// 				            </div>
// 				            <!-- /.navbar-collapse -->
// 				        </nav>
				
// 				        <div id="page-wrapper">
				
// 				            <div class="container-fluid">
								
// 								<div class="wrapper-personal-info">
// 									<form class="form-personal-info" action="">       
// 								    	<h2 class="form-personal-info-heading">Personal info</h2>
								    	
// 										<p id="error_first_name" class="error hidden">This field is required!</p>
// 								    	<label for="first_name">First Name</label>
// 										<input type="text" class="form-control-profile" id="first_name" name="first_name"
// 											value = ' .   htmlentities($this->adminFirstName, ENT_QUOTES, 'UTF-8') . ' /> 
											
// 										<p id="error_last_name" class="error hidden">This field is required!</p>
// 										<label for="last_name">Last Name</label>
// 										<input type="text" class="form-control-profile" id="last_name" name="last_name"
// 											value = ' .   htmlentities($this->adminLastName, ENT_QUOTES, 'UTF-8') . ' /> 
										
// 										<p id="error_username" class="error hidden">This field is required!</p>
// 										<label for="username">Username</label>
// 										<input type="text" class="form-control-profile" id="username" name="username"
// 												value = ' .  htmlentities($this->adminUsername, ENT_QUOTES, 'UTF-8') . ' /> 
										
// 										<p id="error_email" class="error hidden">This field is required!</p>
// 										<label for="email">Email</label>
// 										<input type="text" class="form-control-profile" id="email" name="email"
// 													value = ' .  htmlentities($this->adminEmail, ENT_QUOTES, 'UTF-8') . ' />  
										
// 										<p id="error_tel" class="error hidden">This field is required!</p>
// 										<label for="tel">Telephone</label>
// 										<input type="text" class="form-control-profile" id="tel" name="tel" 
// 												value = ' .  htmlentities($this->adminTel, ENT_QUOTES, 'UTF-8') . ' />  
										
// 										<button id="btn-form-change" class="btn btn-lg btn-primary btn-block" type="button">Change</button>   
// 									</form>
// 								</div>
// 				            </div>
				
// 				        </div>
// 				        <!-- /#page-wrapper -->
				
// 				    </div>
// 				    <!-- /#wrapper -->
				
// 				    <!-- jQuery -->
// 				    <script src="assets/js/jquery.js"></script>
				
// 				    <!-- Bootstrap Core JavaScript -->
// 				    <script src="assets/js/bootstrap.min.js"></script>
				
// 				</body>
				
// 				</html>';

		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
		echo '<!-- profile -->
					<link rel="stylesheet" type="text/css" href="assets/css/personalInfo.css" />
				<!--JS -->
					<script type="text/javascript" src="assets/js/ajax.js"></script>
					<script type="text/javascript" src="assets/js/changePersonalInfo.js"></script>
					<link rel="stylesheet" type="text/css" href="assets/css/logIn.css" />';
		
		$loadPage->renderHeader($this->adminFirstName);
		$loadPage->renderNav();
		
		echo '
				        <div id="page-wrapper">
				
				            <div class="container-fluid">
								
								<div class="wrapper-personal-info">
									<form class="form-personal-info" action="">       
								    	<h2 class="form-personal-info-heading">Personal info</h2>
								    	
										<p id="error_first_name" class="error hidden">This field is required!</p>
								    	<label for="first_name">First Name</label>
										<input type="text" class="form-control-profile" id="first_name" name="first_name"
											value = ' .   htmlentities($this->adminFirstName, ENT_QUOTES, 'UTF-8') . ' /> 
											
										<p id="error_last_name" class="error hidden">This field is required!</p>
										<label for="last_name">Last Name</label>
										<input type="text" class="form-control-profile" id="last_name" name="last_name"
											value = ' .   htmlentities($this->adminLastName, ENT_QUOTES, 'UTF-8') . ' /> 
										
										<p id="error_username" class="error hidden">This field is required!</p>
										<label for="username">Username</label>
										<input type="text" class="form-control-profile" id="username" name="username"
												value = ' .  htmlentities($this->adminUsername, ENT_QUOTES, 'UTF-8') . ' /> 
										
										<p id="error_email" class="error hidden">This field is required!</p>
										<label for="email">Email</label>
										<input type="text" class="form-control-profile" id="email" name="email"
													value = ' .  htmlentities($this->adminEmail, ENT_QUOTES, 'UTF-8') . ' />  
										
										<p id="error_tel" class="error hidden">This field is required!</p>
										<label for="tel">Telephone</label>
										<input type="text" class="form-control-profile" id="tel" name="tel" 
												value = ' .  htmlentities($this->adminTel, ENT_QUOTES, 'UTF-8') . ' />  
										
										<button id="btn-form-change" class="btn btn-lg btn-primary btn-block" type="button">Change</button>   
									</form>
								</div>
				            </div>
				
				        </div>
				        <!-- /#page-wrapper -->';
		
		$loadPage->renderAssets();
	}
	
	public function renderSuccesse(){
		
		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		$loadPage->renderHeader($this->adminFirstName);
		$loadPage->renderNav();
		
		echo '<h3 style="padding: 50px;"> Your profile information is successfully changed! </h3>';
		
		$loadPage->renderAssets();
	}
}
