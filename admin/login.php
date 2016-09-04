<?php
   error_reporting(E_ALL);
   //ini_set('display_errors', '1');	
   include '../functions.php';
   session_start();
   
   
  // username and password sent from form 
  
  //$myusername = mysqli_real_escape_string($db,$_POST['username']);
  //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
  if($_SERVER['REQUEST_METHOD'] == "POST"){
	  
	  $user = $_POST["username"];
	  $pass = $_POST['password'];
	  
	  $sql = "SELECT id FROM admin WHERE User = '".$user."' and Pass = '".$pass."'";
	  $result = $db->query($sql);
	  $row = mysqli_fetch_array($result);
	  //$active = $row['active'];
	  
	  $count = mysqli_num_rows($result);
	  
	  // If result matched $myusername and $mypassword, table row must be 1 row
		
	  if($count == 1) {
		 //session_register("admin");
		 $_SESSION['login_user'] = $user;
		 
		 header("location: admin.php");
	  }else {
		 $error = "Your Login Name or Password is invalid";
	  }
  }
?>
<html>
   
   <head>
      <title>Admin</title>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="../js/materialize.js"></script>
	  <script type="text/javascript" src="../js/script.js"></script>
	  <link type="text/css" rel="stylesheet"" href="../css/materialize.css"  media="screen,projection"/>
      <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" >
      
   </head>
   <!-- background-color: #1E88E5 -->
   <body bgcolor = "#1E88E5">
	
      <div align = "center">
         <div style = "width:500px; ">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="card grey lighten-4">
							<div class="card-content black-text">
								<span class="card-title blue-text darken-1"><b>ESSS Admin Hub</b></span>
						
								<div style = "margin:30px"> 
								   <form id="LeForm" action = "login.php" method = "post">
									  <label class="blue-text darken-2" style="font-size:18px">Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
									  <label class="blue-text darken-2" style="font-size:18px">Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
									  <div class="caption center-align">
										<button style="cursor: pointer;" class="btn-large waves-effect waves-light blue darken-1" type="submit">Login</button><br />
									  </div>
								   </form>
								   <script>
									function submit(){
										document.getElementById("LeForm").submit();
									}
								   </script>
								   <?php if(isset($error)){ ?>
								   <div class="card grey lighten-4">
									<div class="card-content red-text">
								   
									   <?php echo $error; ?>
								   </div></div>
								   <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
         </div>	
      </div>
   </body>
</html>