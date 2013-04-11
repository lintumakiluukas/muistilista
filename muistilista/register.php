
<html><head>
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

// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=lulululu",
                      "lulululu", "0571d57307ed8491");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus     
$kysely = $yhteys->prepare("SELECT username FROM tunnukset WHERE username='$user'");
$kysely->execute();

$rivi = $kysely->fetch();
if ($rivi["username"]!=null)
{
?>
<p div class="center" >Valitsemasi käyttäjätunnus on jo käytössä!";</p>

<br>
<a div class="center" href="register.html">Takaisin</a><br>
<?php
}else if($pw!=$pw2){
?>
<p div class="center" >Salasanat eivät täsmää!";</p>
<?php
}else{

$kysely2 = $yhteys->prepare("INSERT INTO tunnukset (username, password) VALUES (?, ?)");
$kysely2->execute(array($_POST["username"], $_POST["password"]));
?>
<h1 div class="center">Tervetuloa muistilistapalveluun, <?php echo $user;?>!</h1>

<?php
}
?>



</body>
</html> 