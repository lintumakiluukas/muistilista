
<?php
include 'yhteys.php';
$id=$_POST["muistilistaid"];
$kysely = $yhteys->prepare("DELETE FROM muistilista WHERE muistilistaid='$id';");
$kysely->execute();

$kysely2 = $yhteys->prepare("DELETE FROM askare WHERE muistilistaid='$id';");
$kysely2->execute();


header("location:mylists.php");
?>