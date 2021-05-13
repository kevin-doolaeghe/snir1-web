<hmtl>
<head>
	<title>Alea PHP</title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<style>
		body
		{
			padding-top: 20px;
			background-color: grey;
			font: "Segoe UI";
			color: white;
			font-size: 150%;
			text-align: center;
		}
	</style>
</head>
<body>
	Allez-vous trouver facilement ? je ne crois pas moi ...<br>
	<!--<meta charset="utf-8">-->
	<?php
		//var_dump($_POST);
		$_COOKIE["alea"];//$_POST["alea"];
		$cpteur = $_POST["cpteur"];
		$cpteur++;
		echo'<form name="formSaisie" action="resultats.php" method="post">';
		echo'Nombre:<input name="n" type="text">';
		//echo "<input type=hidden name='alea' value='$alea'>"; 
		echo "<input type=hidden name='cpteur' value='$cpteur'>";
		echo '<input value="Ok" onclick="Valide(n)" type="button">';
		echo '</form>';
	?>

<script type="text/javascript">
function Valide(valeur)
{
if (valeur.value!="") document.formSaisie.submit();
else alert("Veuillez entrer un nombre, merci :)");
}
</script>

</body>
</hmtl>