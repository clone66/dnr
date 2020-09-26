<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
echo $_SESSION['start'];
echo'<br/>';
echo time();
echo'<br/>';

echo'<br/>';
if(time()-$_SESSION["start"]>86400)
session_destroy();
var_dump($_SESSION);
if($_SESSION["user_name"]) {

?>
Welcome <?php echo $_SESSION["user_name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}

else echo "<h1>Please login first .</h1>";
?>
<a href=login.php>login</a>
</body>
</html>