
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
.center
{
margin:auto;
width:50%;
background-color:#CCCCFF;
}
</style>
<link rel="stylesheet" type="text/css" href="tyyli.css"></head>
<body>


<?php
$user=$_POST["username"];
$pass=$_POST["password"];
 include 'yhteys.php';
$kysely = $yhteys->prepare("SELECT password FROM tunnukset WHERE username = ?"); 
$kysely->execute(array($user));


$rivi = $kysely->fetch();
if ($_POST["password"]==$rivi["password"] && $_POST["password"]!=null)
{
include 'menu.php';
session_start();
$_SESSION['user']=$user;
$_SESSION['pass']=$pass;
echo $_SESSION['user'];
echo ":D";
header("location:mylists.php");
?>


<?php
}else{
?>

<p div class="center">Virheellinen k&#228;ytt&#228;j&#228;tunnus tai salasana</p>

<br>
<a  div class="center" href="index.html">Yrit&#228; uudestaan</a><br>
<a div class="center" href="recoverpassword.html">Unohtuiko salasana?</a><br>
<a div class="center" href="register.html">Rekisteröidy</a>
<?php
}
?>









</body>
</html> 