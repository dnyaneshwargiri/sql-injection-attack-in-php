<?php
   include("config.php");	/*for db connection*/
   session_start(); 		/*to store valid username into session instance*/
   $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $sql= str_replace("\'","'",$sql);		/*to escape blanks and spaces from input*/
      $result = mysqli_query($db,$sql);		
      $count = mysqli_num_rows($result);
      $username_find_flag=false;
      $password_correct_flag=false;
      $query_result=array();
      while( $rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
				  foreach($rows as $row)
			  {		
					   $query_result[]=$row;
					if(strcmp($row,$myusername))
					  {
					  $username_find_flag=true;
					  }
					  if(strcmp($row,$mypassword))
					  {
					  $password_correct_flag=true;
					  }
			  }
			
	  }


      if($username_find_flag and $password_correct_flag)
      {
		  $_SESSION['login_user'] = $myusername;
		  $_SESSION['sql_query'] = $sql;
		  $_SESSION['count'] = $count;
		  $_SESSION['query_result'] = $query_result;
          header("location: welcome.php");
	  }
	  else{
		  $error = "Your Login Name or Password is invalid";
		  }



      // sql injection proof code

     /* if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }*/



   }
?>
<html>
   <!--
Author:Dnyaneshwar Giri
Date:26-03-2019
 -->
   <head>
      <title>Login Page</title>
      <head>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<title>Login</title>
		<style>
		#loginform{
			display:block;
			margin-left: auto;
			margin-right: auto;
			width: 30%;
		}
		#submit{
			display:block;
			margin-left: auto;
			margin-right: auto;
			text-align:center;
			font-family: 'Quicksand', sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid" id='container' style="margin:0;padding:0;">
			<div class="row">
			<div  class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="height:180px;color:82B1FF;">
					<p style="font-size:80px;text-align:center;">Login System</p>
				</div>
				<div  class="col-md-3 col-lg-3"></div>
				<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6" style="background-color:E1BEE7;border-radius:10px;">
						<br/>
						<br/>
					   <form action="" name="loginform"  method="POST">
							  <p style="text-align:center;font-size:24px;"><span class="fa fa-user-circle"></span> <input type="text" name="username"  placeholder="your username" class="form-group input-lg" required></p>
							  <br/>
							  <p style="text-align:center;font-size:24px;"><span class="fa fa-key"></span> <input type="password" name="password"  placeholder="your password" class="form-group input-lg" required></p>
							  <button type="submit" id="submit"  class="btn  btn-lg text-dark form-group" style="color:4CAF50;"  >
								<span style="font-size:24px;"> Login </span>
								<span style="font-size:24px;" class="fa fa-sign-in"></span>
							  </button>
							  <br/>
							  <br/>
						</form>
						<div style = "font-size:24px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				</div>
				<div style="" class="col-md-3 col-lg-3"></div>

			</div>
		</div>
		<script type='text/javascript'>
		</script>
   </body>
</html>
