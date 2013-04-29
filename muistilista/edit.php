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
<?php


include 'yhteys.php';
if($_POST["lista"]==1){
$muistilistannimi=$_POST["muistilistannimi"];
$id=$_POST["muistilistaid"];
$kysely = $yhteys->prepare("UPDATE muistilista SET muistilistannimi='$muistilistannimi' WHERE muistilistaid='$id';");
$kysely->execute();
header("location:mylists.php");

}else if($_POST["pw"]!=null){
$pw=$_POST["pw"];
$pw2=$_POST["pw2"];
$username=$_POST["username"];

if($pw==$pw2){
$kysely = $yhteys->prepare("UPDATE tunnukset SET password='$pw' WHERE username='$username';");
$kysely->execute();
header("location:settings.php");
}else{
?>
<br>
<a href="settings.php">Paluu</a>
<p div class="center" >Salasanat eiv&#228;t t&#228;sm&#228;&#228;!</p>
<br>
<?php
}

}else{
$nimi=$_POST["askareennimi"];
$id=$_POST["askareid"];
$tarkeysaste=$_POST["tarkeysaste"];

$kysely = $yhteys->prepare("UPDATE askare SET tarkeysaste='$tarkeysaste', askareennimi='$nimi' WHERE askareid='$id';");
$kysely->execute();
header("location:mylists.php");

}

?>
</body>
</html>