<?php
session_start();
$message="";


            if (isset($_POST['user_name']) && !empty($_POST['user_name']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['user_name'] == 'q' && 
                  $_POST['password'] == 'q') {
                   $_SESSION['user_name'] = 'q';
				   
                  $_SESSION['start']=time();
				  //$_SESSION['expire']=$_SESSION['start'];
				  
                  echo 'You have entered valid use name and password';
               }else {
                  echo 'Wrong username or password';
               }
            }


if(isset($_SESSION["user_name"])) {
header("Location:index.php");
}
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="user_name">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>