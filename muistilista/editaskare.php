
<?php include 'menu.php'; ?><html>
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
$id=$_POST["askareid"];

$kysely2 = $yhteys->prepare("SELECT * FROM askare WHERE askareid='$id'");
$kysely2->execute();
$rivi = $kysely2->fetch();
$name=$rivi["askareennimi"];

$kysely2 = $yhteys->prepare("SELECT * FROM askare WHERE askareid='$id'");
$kysely2->execute();
$rivi = $kysely2->fetch();

$ta=$rivi["tarkeysaste"];

?>

<form action="edit.php" method="post" div class="center" >
<h3>Muokkaa askaretta</h3>
<table>
<tr><td>Askare: <td><input type="text" name="askareennimi" value='<?php echo $name; ?>'></tr>
<tr><td>T&#228;rkeysaste: <td>
<select name="tarkeysaste">
<option value="1"<?php if($ta==1){echo " selected ";} ?>>Hyvin t&#228;rke&#228;</option>
<option value="2"<?php if($ta==2){echo " selected ";} ?>>Melko t&#228;rke&#228;</option>
<option value="3"<?php if($ta==3){echo " selected ";} ?>>Ei niin t&#228;rke&#228;</option>
<option value="4"<?php if($ta==4){echo " selected ";} ?>>Ei niin t&#228;rke&#228; kuin ei niin t&#228;rke&#228;</option>
<option value="5"<?php if($ta==5){echo " selected ";} ?>>Melko turha</option>
<option value="6"<?php if($ta==6){echo " selected ";} ?>>Ei t&#228;rkeysastetta</option>
</select>
</td>
</tr>
</table>
<input type='hidden' name='askareid' value='<?php echo $id; ?>'>
<input type="submit" value="Muokkaa">
</form>
<br>

</body>
</html> 
