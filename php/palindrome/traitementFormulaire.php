<hmtl>
<head>
	<title>Resultat</title>
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
	<!--<meta charset="utf-8">-->
	<?php
		//var_dump($_POST);
		$mess = $_POST["message"];
		echo "Message recu : ".$mess;
		$mess = strtoupper($mess);
		$arr = array(" " => "", "&" => "", "$" => "", "%" => "", "!" => "", "*" => "", "#" => "", "à" => "a", "é" => "e", "è" => "e", "ê" => "e", "ï" => "i", "î" => "i", "ù" => "u", "ç" => "c", "," => "", ":" => "", "." => "", ";" => "", "?" => "", "'" => "", "@" => "");
		$mess = strtr($mess, $arr);
		
		if($mess == strrev($mess)) echo "<br>C'est un palindrome";
		else echo "<br>Ce n'est pas un palindrome";
	?>

</body>
</hmtl>