<?php
session_start();



            if (isset($_POST['user_name']) && !empty($_POST['user_name']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['user_name'] == 'q' && 
                  $_POST['password'] == 'q') {
                  $_SESSION['user_name'] = 'q';
				  $_SESSION['start']=time();
                   header("Location:dinner.php");
               }else {
                  echo 'Не верное имя пользователя';
               }
            }
			

?>

<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">

<br/>
 <br>
 <input type="text" name="user_name">
 <br>
 <br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Войти">

</form>
</body>
</html>

<?php

?>