<?php
session_start();
if($_SESSION['user']==null || $_POST["muistilistannimi"]==null){
header("location:mylists.php");
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
}
</style>
<link rel="stylesheet" type="text/css" href="tyyli.css"></head>
<body>


<?php

include 'yhteys.php';




$kysely = $yhteys->prepare("SELECT * FROM muistilista WHERE muistilistaid='0';");
$kysely->execute();
$rivi = $kysely->fetch();
$id=$rivi["username"]+1;


$kysely3 = $yhteys->prepare("UPDATE muistilista SET username='$id' where muistilistaid='0';");
$kysely3->execute();

$user=$_SESSION['user'];
$nimi=$_POST["muistilistannimi"];
$kysely2 = $yhteys->prepare("INSERT INTO muistilista(username, muistilistannimi, muistilistaid) VALUES ('$user', '$nimi', '$id');");
$kysely2->execute();
header("location:mylists.php");
?>






</body>
</html> 