<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

  <head>  	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="description" content="Control de asistencia de personal - CETPRO CETICO"/>
	<meta name="keywords" content="CETICO, CETPRO, Control de asistencia, asistencia, personal" />
	<meta name="author" content="Danqueas - Jedil"/>
    <link rel="shortcut icon" href="complementos/img/companies.png"> 
    
	<title>Control de asistencia de personal - CETPRO CETICO</title>
    <!-- Bootstrap core CSS -->
    <link href="complementos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="complementos/css/login.css" rel="stylesheet">
    <link href="complementos/css/animate-custom.css" rel="stylesheet">
   

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
     <script src="js/custom.modernizr.js" type="text/javascript" ></script>
   
  </head>
    <body>
    	<!-- start Login box -->
    	<div class="container" id="login-block">
    		<div class="row">
			    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			    	<h3 class="animated bounceInDown">Login</h3>
			       <div class="login-box clearfix animated flipInY">
			        	<div class="login-logo">
			        		<a href="index.php"><img src="complementos/img/login-logo.gif" alt="Company Logo" /></a>
			        	</div> 
			        	<hr />
			        	<div class="login-form">
			        		<div class="alert alert-error hide">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <h4>Error!</h4>
								   Your Error Message goes here
							</div>
			        		<form method="POST" id="form-login" action="Negocio/BL_login.php">
						   		<input type="text" placeholder="User name" required name="txtusuario" /> 
						   		<input type="password"  placeholder="Password" required name="txtpassword" /> 
						   		<input type="hidden"  value="verificar" name="evento" /> 
						   		<button type="submit" class="btn btn-red">Login</button> 
							</form>	
			        	</div> 			        	
			       </div>
			    </div>
			</div>
    	</div>
     
      	<!-- End Login box -->
     	<footer class="container">
     		<p id="footer-text"><small>Copyright &copy; 2015</small></p>
     	</footer>

        <script src="complementos/js/jquery.min.js"></script>
        <script src="complementos/js/bootstrap.min.js"></script> 
    </body>
</html>