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
border-style:solid;
border-width:1px;
margin:auto;
width:50%;
background-color:#CCCCFF;
}
.bgcolor
{
border-style:solid;
border-width:1px;
width:50%;
background-color:#CCCCFF;
}
</style>
<link rel="stylesheet" type="text/css" href="tyyli.css"></head>
<body>


<?php

include 'menu.php';
include 'yhteys.php';
 ?>
<br><br><br>
 <?php
$user=$_SESSION['user'];
if($user!="admin"){
$kysely = $yhteys->prepare("SELECT * FROM muistilista where username='$user' ORDER BY muistilistannimi");
$kysely->execute();
}else{
$kysely = $yhteys->prepare("SELECT * FROM muistilista ORDER BY muistilistannimi");
$kysely->execute();
}
//rivien tulostus


echo "<table div class='bgcolor'>";
echo " <tr><td>K&#228;ytt&#228;j&#228;n ". $_SESSION['user'] ." muistilistat:</td></tr><tr><td>";
while ($rivi = $kysely->fetch()) {
$id=$rivi["muistilistaid"];
$kysely2 = $yhteys->prepare("SELECT COUNT(*) AS amount FROM askare WHERE muistilistaid='$id';");//Askareiden määrä
$kysely2->execute();
$rivi2 = $kysely2->fetch();
$amount = $rivi2["amount"];
echo "<form action='viewlist.php' method='post'>";
echo "<input type='hidden' name='muistilistaid' value=". $rivi["muistilistaid"]. "> ";
echo "<input type='submit' value='". $rivi["muistilistannimi"] ."'> Askareita ". $amount ."";
if($user=="admin"){
echo " K&#228;ytt&#228;j&#228;: ". $rivi["username"] ." MuistilistaID: ". $rivi["muistilistaid"]."";
}
echo "</form>";

}

echo "</td></tr></table>";


?>



<br>
 <a href="newlist.html">Luo uusi lista</a>




</body>
</html> 