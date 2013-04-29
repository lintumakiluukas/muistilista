
<?php


include 'yhteys.php';
$nimi=$_POST["askareennimi"];
$muistilistaid=$_POST["muistilistaid"];
$tarkeysaste=$_POST["tarkeysaste"];



$kysely2 = $yhteys->prepare("SELECT * FROM askare WHERE askareid=0;");
$kysely2->execute();
$rivi = $kysely2->fetch();
$id=$rivi["tarkeysaste"]+1;


$kysely = $yhteys->prepare("INSERT INTO askare VALUES($muistilistaid, $id, '$nimi', $tarkeysaste);");
$kysely->execute();

$kysely3 = $yhteys->prepare("UPDATE askare SET tarkeysaste='$id' WHERE askareid=0;");
$kysely3->execute();
header("location:mylists.php");



?>