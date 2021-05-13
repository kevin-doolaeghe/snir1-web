<head><link rel="stylesheet" type="text/css" media="screen" href="styleLivreDor.css" >
<meta charset="ISO-8859-1"> </head>
<?php
class ihm {
//----------------------
function afficheInviteFormulaire()
{
//?? 
echo "<a href='../../../index.php'><input type=submit value='Retour au menu'/></a>
<a href='index.php'><input type=submit value=Recharger /></a>
<a href='index.php'><input type=submit id=bouton_connec value=Connexion /></a>



<div id='connec_form' style='position: fixed; width: 70%; height: 70%; top:20%;left:20%; z-index:1000;background: rgba(150,150,150,0.8)'>
<input name=username autofocus required />
<input name=email required />
</div>



<a href='#form'>Formulaire</a>
<br>Le formulaire se trouve en bas de la page<br><br>
<script src='jquery-3.3.1.min.js'></script>
<script>
$(document).ready(function()
{
	$('#connec_form').hide();
	$('#bouton_connec').click(function()
	{
		$('#connec_form').fadeToggle();
	});
});
</script>
"; 
}
//----------------------
function afficheReponse($tableObjets)
{
	$nbre=count($tableObjets);
	echo $nbre." messages
	</b><p><table width=60% class='cadre'> ";

	foreach ($tableObjets as $objet )
		{
		echo '<tr><td><label class= "noir">Message de : ';
		// Affiche le Pseudo du posteur de message (avec lien mailto:)
		echo '<a href=mailto:'.$objet->lemail.'> '.$objet->nom.'</a>';
		echo ' Post&eacute; le : </font></label>';
	    // Affiche la date où a eté posté le message
	    echo '<label class= "rouge">'.date("d/m/Y - H:i",$objet->date).'</label>';
		
		if($objet->emplacement != NULL) echo 'fichier :<a href="'.$objet->emplacement.'">Voir</a>';
	    // Affiche le message posté
	    echo '<div class="bleu">'.$objet->message.'</div>';
	    //echo '<hr size=1></td></tr>';
      	}
	echo "</table></p>";	
}
//----------------------
function afficheFormulaire()
{
echo'
<div id="form" class="formulaire" style="position:absolute;width:510px;left:400px;bottom:10px;height:350px">
<a name=formulaire></a>
<br><a href=#haut>haut de page</a> <br><br>
<form action="index.php" name="formulaire" method="post" enctype="multipart/form-data">
<div>
<textarea name="message" row=10 cols=40 onFocus=\'if(this.value=="Tapez vos commentaires ici") this.value="";\'>Tapez vos commentaires ici</textarea><br>
Nom:<input type="text" name="nom" value="" /><br>
email:<input type="email" name="lemail" value="" /><br>
Upload (non obligatoire)(1Mo Max):<br>
	<input type="file" name="fichier" id="fichier"/>
	<br>
  <input type="submit" name="monbouton" value="Envoi" style="position:relative;left:70px" />


<form action=post>
<br><br><br>
Envoyez un fichier(max 1Mo) <br>Vous aurez acces a une page speciale
<input type=file name="page_speciale" />
<input type="submit" value="envoyer" />
</form>
</div>


<div style="position:relative;left:355px;top:-250px">
Recherche par:<br>
<input type="radio" name="recherche" value="nom">Nom<br>
<input type="radio" name="recherche" value="lemail">Email<br>
<button value="OK" name="Ok" type="submit">OK</button>
</div>


<div style="position:relative;left:355px;top:-200px">
Trier par :<br>
<input type="radio" name="trier" value="nom">Nom<br>
<input type="radio" name="trier" value="date">Date<br>
<button value="OK" name="Ok" type="submit">OK</button>
</div>
</form>
</div>';
}
//----------------------
function afficheRecherche($tableObjets)
{
 //var_dump($tableObjets);
echo "<br>";
/*if(isset($tableObjets[""]->valeur))
{

if (isset($tableObjets[]->nom)) 
{   
    echo "nom: <br>";//$tableObjets[""]->nom;
    $mode="nom";
}
else if (isset($tableObjets[""]->lemail))//VOIR AVEC PROF 0 <> ""
{
	echo "email:<br>";//$tableObjets[""]->lemail;
    $mode="lemail";
}*/

	$nbre=count($tableObjets);

		echo": $nbre"." message(s)
		<table width=90%>";
	if($nbre!=0)
	{

		foreach ($tableObjets as $objet )//!!!!!!!!!!!!!!!!!!!!!!!!!
			{
			echo '<tr><td>le '.date("d/m/Y - H:i",$objet->date);  
			if($objet->emplacement!= NULL) echo ' fichier : <a href="'.$objet->emplacement.'">Voir</a>';
			echo 'message:'.$objet->message; //?????$objet->$mode
			echo '</td></tr>';
			}
		   
			echo "</table></table>";	
		//} else echo 'Vous devez entrer une valeur pour rechercher';
			echo '<br><a href="index.php">Retour</a><br><br>';  
	}
}
//----------------------
function afficheAlerte($message)
{
echo "<script language=javascript>
            alert('$message');</script>";
}
}//fin de la classe
?>
