
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
$user=$_POST["username"];
$pw=$_POST["password"];
$pw2=$_POST["password2"];


include 'yhteys.php';

// kyselyn suoritus     
$kysely = $yhteys->prepare("SELECT username FROM tunnukset WHERE username='$user'");
$kysely->execute();

$rivi = $kysely->fetch();
if ($rivi["username"]!=null)
{
?>
<p div class="center" >Valitsemasi k&#228;ytt&#228;j&#228;tunnus on jo k&#228;ytöss&#228;!";</p>

<br>
<a div class="center" href="register.html">Takaisin</a><br>
<?php
}else if($pw!=$pw2){
?>
<p div class="center" >Salasanat eiv&#228;t t&#228;sm&#228;&#228;!</p>
<?php
}else{

$kysely2 = $yhteys->prepare("INSERT INTO tunnukset (username, password) VALUES (?, ?)");
$kysely2->execute(array($_POST["username"], $_POST["password"]));
?>
<h1 div class="center">Tervetuloa muistilistapalveluun, <?php echo $user;?>!</h1><br>
<a href="index.html" div class="center">Kirjaudu sis&#228;&#228;n</a>

<?php
}
?>



</body>
</html> 