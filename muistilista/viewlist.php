
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
<a href="mylists.php">Paluu</a>

<?php
$id=$_POST["muistilistaid"];


include 'yhteys.php';

$nimikysely = $yhteys->prepare("SELECT * FROM muistilista WHERE muistilistaid='".$id."';");
$nimikysely->execute();
$rivi = $nimikysely->fetch();
$muistilistannimi=$rivi["muistilistannimi"];
echo "<br><h1 div class='center'>".$muistilistannimi."</h1>";
?>
<br>
<?php
switch($_POST["orderby"]){
case null:$kysely = $yhteys->prepare("SELECT * FROM askare WHERE muistilistaid=$id;");break;
case "tarkeys":$kysely = $yhteys->prepare("SELECT * FROM askare WHERE muistilistaid=$id ORDER BY tarkeysaste;");break;
case "tarkeyslaskeva":$kysely = $yhteys->prepare("SELECT * FROM askare WHERE muistilistaid=$id ORDER BY tarkeysaste DESC;");break;
case "nimi":$kysely = $yhteys->prepare("SELECT * FROM askare WHERE muistilistaid=$id ORDER BY askareennimi;");break;
case "nimilaskeva":$kysely = $yhteys->prepare("SELECT * FROM askare WHERE muistilistaid=$id ORDER BY askareennimi DESC;");break;
}

$kysely->execute();

echo "<br><table BORDER=1 CELLPADDING=3 CELLSPACING=1 RULES=ROWS FRAME=BOX div class='center'>";
echo "<tr><td>Askare</td>";
echo "<td>T&#228;rkeysaste ";

echo "</td></tr>";
while ($rivi = $kysely->fetch()) {
$ta="Ei t&#228;rkeysastetta";
switch($rivi["tarkeysaste"]){
case 1: $ta="Hyvin t&#228;rke&#228;"; break;
case 2: $ta="Melko t&#228;rke&#228;"; break;
case 3: $ta="Ei niin t&#228;rke&#228;"; break;
case 4: $ta="Ei niin t&#228;rk&#228; kuin ei niin t&#228;rke&#228;"; break;
case 5: $ta="Melko turha"; break;
}
echo "<tr>";
echo "";
echo "<td>". $rivi["askareennimi"];
echo "<td>". $ta;
echo "<td><form action='rmaskare.php' method='post'><input type='hidden' name='askareid' value=". $rivi["askareid"]. "> <input type='submit' value='&#10004;'></form></td>
<td><form action='editaskare.php' method='post'><input type='hidden' name='askareid' value=". $rivi["askareid"]. "> <input type='submit' value='...'></form></td>";
echo "</tr>";

}
echo "</table> ";


?>
<br>
<form div class="center" action='viewlist.php' method='post'>
<input type="hidden" name="muistilistaid" value='<?php echo $id;?>'>
<select name="orderby">
<option value="tarkeys">T&#228;rkeyden mukaan (nouseva)</option>
<option value="tarkeyslaskeva">T&#228;rkeyden mukaan (laskeva)</option>
<option value="nimi">Nimen mukaan (nouseva)</option>
<option value="nimilaskeva">Nimen mukaan (nouseva)</option>
</select>
<input type='submit' value='J&#228;rjest&#228;'>
</form>


<br>
<form action="addaskare.php" method="post" div class="center" >
<h3>Uusi askare</h3>
<table>

<tr><td>Askare: <td><input type="text" name="askareennimi"></tr>
<tr><td>T&#228;rkeysaste: <td>
<select name="tarkeysaste">
<option value="1">Hyvin t&#228;rke&#228;</option>
<option value="2">Melko t&#228;rke&#228;</option>
<option value="3">Ei niin t&#228;rke&#228;</option>
<option value="4">Ei niin t&#228;rke&#228; kuin ei niin t&#228;rke&#228;</option>
<option value="5">Melko turha</option>
<option value="6" selected>Ei t&#228;rkeysastetta</option>
</select>
</td>
</tr>
</table>
<input type='hidden' name='muistilistaid' value='<?php echo $id; ?>'>
<input type="submit" value="Lis&#228;&#228; askare">
</form>
<br>
<form div class="center" action="editlist.php" method="post">
<h3>Muistilistan muokkaaminen</h3>
<br>
<input type="hidden" name="muistilistaid" value="<?php echo $id;?>">
<input type="submit" value="Muistilistan asetukset">
</form>





</body>
</html> 