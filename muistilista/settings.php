<?php
session_start();
if($_SESSION['user']==null){
header("location:index.html");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
.center
{
margin:auto;
width:50%;
background-color:#CCCCFF;
border-style:solid;
border-width:1px;
}
</style>
<link rel="stylesheet" type="text/css" href="tyyli.css"></head>
<body>
<br>
<?php
include 'menu.php';
include 'yhteys.php';

$id=$_POST["askareid"];
$name=$_SESSION["user"];

$kysely2 = $yhteys->prepare("SELECT * FROM tunnukset WHERE username='$name'");
$kysely2->execute();
$rivi = $kysely2->fetch();
$password=$rivi["password"];

?>
<br>
<form action="edit.php" method="post" div class="center" >
<h3>Asetukset</h3>
<table  div class='center'>
<tr>
<td>K&#228;ytt&#228;j&#228;tunnus
<td><input disabled type="text" name="username" value='<?php echo $name;?>'><input type="hidden" name="username" value='<?php echo $name;?>'>
</tr>
<tr>
<td>Salasana:
<td><input type="password" name="pw" value='<?php echo $password;?>'>
</tr>
<tr>
<td>Salasana uudelleen:
<td><input type="password" name="pw2" value='<?php echo $password;?>'>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Muokkaa">
</tr>
</table>
<br>
</form>
<br>

</body>
</html> 
