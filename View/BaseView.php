<?php 
namespace View;

class BaseView
{
	public function renderBaseView(){
		
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
// 				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> TODO
// 									<b class="caret"></b></a>
// 				                    <ul class="dropdown-menu">
// 				                        <li>
// 				                            <a href="index.php?controller=profile&action=renderProfileForm"><i class="fa fa-fw fa-user"></i> Profile</a>
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
// 								<h3>Welcome</h3>
								
// 								<h4>Search for posts</h4>
// 								<div class="container-search">
// 									<div class="row">
// 								        <div class="span12">
// 								            <form id="custom-search-form" class="form-search form-horizontal pull-right">
// 								                <div class="input-append span12">
// 								                    <input type="text" class="search-query" placeholder="Search">
// 								                    <button type="submit" class="btn"><i class="icon-search"></i></button>
// 								                </div>
// 								            </form>
// 								        </div>
// 									</div>
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
				
// 				</html>	';

		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
		echo '<!-- Custom CSS -->
					<link href="assets/css/newSearch.css" rel="stylesheet">
				<!-- AJAX -->
 				    <script type="text/javascript" src="assets/js/ajax.js"></script>
				<!-- Custom JS -->
 				    <script type="text/javascript" src="assets/js/newSearch.js"></script>
			  ';
		
		//TODO admin name
		$loadPage->renderHeader('Petyr');
		$loadPage->renderNav();
		
		echo ' <div id="page-wrapper">
				
				            <div class="container-fluid">
								<h3>Search</h3>
				
								<div id="newSearch">
								
									<form id="f" method="post" action="">				
										
										<p id="error" class="error hidden">Invalid parameters. Please, check your input.</p>
										<label for="brand">Brand</label>
								 		<input type ="text" name="brand" id="brand" />									
								
										<label for="model">Model</label>
								 		<input type ="text" name="model" id="model" />
								
										<label for="color">Color</label>
										<input type ="text" name="color" id="color" />									
								
										<label for="km">Kilometres</label>
								 		<input type="text"  name="km"  id="km"  class="from-to" placeholder="from" />
										<input type="text"  name="km"  id="kmTo"  class="from-to" placeholder="to" />
								
										<label for="hp">Horse Power</label>
								 		<input type="text"  name="hp"  id="hp"  class="from-to" placeholder="from" />									
										<input type="text"  name="hp"  id="hpTo"  class="from-to" placeholder="to" />	
					
										<label for="year">Year</label>
										<input type ="text" name="year" id="year"  class="from-to" placeholder="from" />	
										<input type ="text" name="year" id="yearTo"  class="from-to" placeholder="to" />	
										
										<label for="price">Price</label>
										<input type ="text" name="price" id="price"  class="from-to" placeholder="from" />
										<input type ="text" name="price" id="priceTo"  class="from-to" placeholder="to" />
					
										<button type="button" id="btn-search" class="btn btn-primary fa fa-search">Search</button>
									</form>
				
								</div>				
				            </div>
				
							<div class="col-lg-6">
			                       <h3>Cars</h3>
			                       <div class="table-responsive">
			                            <table  id="result-search" class="table table-bordered table-hover table-striped">
			                                <thead>
			                                   <tr>
												<th>#</th>
			                                    <th>Brand</th>                                        
			                                    <th>Model</th>
												<th>Color</th>                                        
			                                    <th>Price</th>
												<th>Kilometres</th>                                        
			                                    <th>Hourse Powers</th>
												<th>Year</th>  
												<th>Link</th> 
			                                   </tr>
			                               </thead>
			                               <tbody>
							
			                               </tbody>
			                           </table>
									   <p id="no-match" class="error hidden">There is nothing to show.</p>
			                       </div>
	                   		 </div>
									';
		
		$loadPage->renderAssets();
		
	}
	
	
}