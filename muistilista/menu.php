

<html>
<head>
<?php
if($_SESSION['user']!=null){
echo "<title>Muistilista | ". $_SESSION['user'] ."</title>";
}else{
echo "<title>Muistilista</title>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
.center
{
margin:auto;
width:50%;
background-color:#CCCCFF;
}
</style>
<link rel="stylesheet" type="text/css" href="tyyli.css">
</head>

<body>
<?php
if($_SESSION['user']!=null){
echo "Kirjautunut: ". $_SESSION['user'];
}

?>

<table div class="center">

<tr><td><a href="mylists.php">Omat listat</a>
<td><a href="settings.php">Asetukset</a>
<td><a href="logout.php">Kirjaudu ulos</a></tr>

</table>
</body>
</html>