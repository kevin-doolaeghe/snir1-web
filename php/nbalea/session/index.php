<?php 
session_start();
function aleatoire($min,$max) 
{ 
$temps=explode (" ",microtime()); 
$usec=$temps[0]; 
srand($usec*1000000); 
$mystere = rand($min,$max); 
return $mystere; 
} 
$alea=aleatoire(0,100); 
$cpteur=0;
//var_dump($_POST);
?> 
<HTML> 
<HEAD><TITLE> Rostand Jeux </TITLE> </HEAD> 
<BODY style="color:white; font-family: 'Segoe UI'; font-size: 150%; text-align: center; margin: 50px 50px 50px 50px;background-color: grey">
But: Trouver un nombre compris <br>  entre 0 et 100 
 <br> 
<?php
$_SESSION["alea"]= $alea;
//setcookie("alea", $alea, time() + 3600);
echo '<form action="saisie.php" method=post>'; 
//echo "<input type=hidden name='alea' value='$alea'>"; 
echo "<input type=hidden name='cpteur' value='$cpteur'>"; 
echo "<input style='border: hidden; font-size:120%;' type=submit value=Jouer>"; 
echo "</form>"; 
?> 
<a href="../../index.php">Retourner au menu</a>
</BODY>
</HTML>