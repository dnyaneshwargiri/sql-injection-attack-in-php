<?php
   include('session.php');
?>
<html>
<!--
Author:Dnyaneshwar Giri
Date:26-03-2019
-->
   <head>
      <title>Welcome </title>
   </head>
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "logout.php">Sign Out</a></h2>
		  <?php
		  $rows;
	   		/*Displaying sql malicious query and its result for demo purpose*/
		  echo('SQL Query  - '.$_SESSION['sql_query'].'</br>');
		  echo('Number of records is '.$_SESSION['count'].'</br>');
		  if(isset($_SESSION['query_result']))
		  {
		  $rows = $_SESSION['query_result'];
	      }

		 for($i=0;$i<count($rows);$i++)
		  {	 print_r($rows[$i]);
			 echo("<br/>");
		  }
		  ?>
	</body>
</html>
