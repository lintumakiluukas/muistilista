
<html>
<head>
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
$user=$_POST["username"];
// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=lulululu",
                      "lulululu", "0571d57307ed8491");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus     
$kysely = $yhteys->prepare("SELECT password FROM tunnukset WHERE username='$user'");
$kysely->execute();

$rivi = $kysely->fetch();
if ($_POST["password"]==$rivi["password"] && $_POST["password"]!=null)
{
?>
<p div class="center">hey yo yo yo welcome!</p>

<?php
}else{
?>

<p div class="center">Virheellinen käyttäjätunnus tai salasana</p>

<br>
<a  div class="center" href="index.html">Yritä uudestaan</a><br>
<a div class="center" href="recoverpassword.html">Unohtuiko salasana?</a><br>
<a div class="center" href="register.html">Rekisteröidy</a>
<?php
}
?>









</body>
</html> 