
<?php


include 'yhteys.php';
$id=$_POST["askareid"];
$kysely = $yhteys->prepare("DELETE FROM askare WHERE askareid=$id;");
$kysely->execute();
header("location:mylists.php");
echo ":D";
?>