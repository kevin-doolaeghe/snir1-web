<body style="background-color: grey; margin: 50px 50px 50px 50px; font-family: 'Segoe UI'; font-size: 110%;color : white;">
</body>
<?php
		//var_dump($_POST);
		$alea = $_COOKIE["alea"];//$_POST["alea"];
		$cpteur = $_POST["cpteur"];
		$n = $_POST["n"];
		if($n == $alea)
		{
echo "Vous avez entre :".$n."<br>Vous avez reussi ! Bravo !";
echo "<br>Il vous a fallu ".$cpteur." essais";
echo "<br><br><a href='../../../../index.php'>Retour au menu</a>";
		}
		if($n > $alea)
		{
echo "Vous avez entre :".$n."<br>Trop grand !";
echo'<form action="saisie.php" method="post">';
		//echo "<input type=hidden name='alea' value='$alea'>"; 
		echo "<input type=hidden name='cpteur' value='$cpteur'>";
		echo'<input value="Reesayer" type="submit">
		</form>';
		}
		if($n < $alea)
		{
echo "Vous avez entre :".$n."<br>Trop petit !";
echo'<form action="saisie.php" method="post">';
		//echo "<input type=hidden name='alea' value='$alea'>"; 
		echo "<input type=hidden name='cpteur' value='$cpteur'>";
		echo'<input value="Reesayer" type="submit">
		</form>';
		}
	?>