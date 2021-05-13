<?php session_start(); ?>
<html>
<head><meta charset="iso-8859-1" />
<title>Mon livre d'or</title>
</head>
<body bgcolor=#c0c0c0>

<?php
$ip = $_SERVER['REMOTE_ADDR'];
//echo"<br>ton ip: $ip";
//phpinfo();
include('login.php');
include('ihm.php');
include('livredorDAO.php');


  //ouvre la connexion à la base
  
$dao= new livreDorDAO($serveur,$utilisateur,$passe,$base);//!!!!!!!!!!!!!!!!!!!!!
$monIhm= new ihm(); 
  
//pour visualiser les parametres de REQUEST
 // print_r($_REQUEST);//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
//var_dump($_FILES["fichier"]);
// recuperation des parametres REQUEST
 if (isset($_REQUEST["nom"]))			$nom=$_REQUEST["nom"];
 if (isset($_REQUEST["lemail"]))		$lemail=$_REQUEST["lemail"];//&& strstr($_REQUEST["lemail"], '@')
 if(isset($_FILES["fichier"]))		$fichier=$_FILES["fichier"]['name'];

 if (isset($_REQUEST["message"]))		$message=$_REQUEST["message"];
 

 if(isset($_FILES['page_speciale']))
 {
 	if(!empty($_FILES['page_speciale']['name']))
		{
			$taille = $_FILES['page_speciale']['size']; 
			if($taille <= 1048576)
			{
				//Deplacement
				$nomfichier = "fichiers/".$_FILES['page_speciale']['name'];
				$resultat = move_uploaded_file($_FILES['page_speciale']['tmp_name'], $nomfichier);
				echo '<script>document.location.href="page_speciale.html"</script>';
			}
		}
 }

// si recherche par nom ou email
 	if(isset($_REQUEST["recherche"]))
  	{
  		$champ=$_REQUEST["recherche"];
  		$valeur=$_REQUEST[$champ];
		$reponse=$dao->cherche($champ,$valeur,$table);
		$monIhm->afficheRecherche($reponse);
	}

// si tri par nom ou date
 	if(isset($_REQUEST["trier"]))
   	{
	   	//var_dump($_REQUEST);
	 	$champ=$_REQUEST["trier"];
	 
		if($champ == "nom")	$reponse=$dao->selectMessageParNom();
		else $reponse=$dao->selectMessageParDate();
		$monIhm->afficheReponse($reponse);

   	}

	else
	{// si envoi d'un message
		if (isset($_REQUEST["monbouton"]))
		{
			//var_dump($_FILES);
		//var_dump($_REQUEST);
		if(!empty($_FILES['fichier']['name']))
		{
			$taille = $_FILES['fichier']['size']; 
			if($taille > 1048576)	$fichier=NULL;
			else
			{
				//var_dump($_FILES['fichier']);
				//echo $_FILES['fichier']['tmp_name'];
		
				//Deplacement
				$nomfichier = "fichiers/".$_FILES['fichier']['name'];
				$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'], $nomfichier);
				if ($resultat) echo "Transfert réussi";

				$fichier_avant="fichiers/".$_FILES['fichier']['name'];
				$fichier = strtr
				(
					$fichier_avant, 
					'@ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
					'aAAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
				);
			}
		}
		else $fichier = NULL;

	   	$erreur=$dao->ajoute($nom,$lemail,$message,$table,$fichier, $ip);
		if ($erreur) $monIhm->afficheAlerte("Merci de remplir tous les champs.");
	}
	$monIhm->afficheInviteFormulaire();
	$reponse=$dao->selectMessageParDate();
	$monIhm->afficheReponse($reponse);
}
// Ici se trouve le formulaire d'ajout de message
$monIhm->afficheFormulaire();
?>
</body>
</html>
 

