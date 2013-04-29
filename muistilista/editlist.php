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
<a href="mylists.php">Takaisin</a>
<?php
include 'yhteys.php';
$id=$_POST["muistilistaid"];

$kysely2 = $yhteys->prepare("SELECT * FROM muistilista WHERE muistilistaid='$id';");
$kysely2->execute();
$rivi = $kysely2->fetch();
$name=$rivi["muistilistannimi"];
?>

<form action="edit.php" method="post" div class="center" >
<h3>Muistilistan asetukset</h3>
<table>
<tr><td>Muistilistan nimi: <td><input type="text" name="muistilistannimi" value='<?php echo $name; ?>'></tr>
</table>
<input type='hidden' name='muistilistaid' value='<?php echo $id; ?>'>
<input type='hidden' name='lista' value='1'>
<input type="submit" value="Muokkaa">
</form>
<br>

<form div class="center" action="rmlista.php" method="post">
<h3>Muistilistan muokkaaminen</h3>
<FONT color="red">HUOM!<br>toimintoa EI VOI peruuttaa</FONT><br><br>
<input type="hidden" name="muistilistaid" value="<?php echo $id;?>">
<input type="submit" value="Poista muistilista">
</form>
</body>
</html> 




