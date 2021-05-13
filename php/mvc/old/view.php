<?php
class Vue
{
function afficheTab($tab,$largeur)
{ 
$this->enteteHtml();
//Entrées: 
	//$tab: tableau d'objets contenant le résultat de la requête
	//$largeur: largeur du tableau dans la page Html 100 pour 100%, 50 pour 50%...
//Sortie:	rien
//Traitement:
	// Affichage du tableau sur largeur désirée
//echo "affiche";
//print_r($tab);
if($tab)
{
	$t=new ArrayObject($tab[0]);
	$colonne=count($t);

	if (is_array($tab))
		{
		$ligne=count($tab);
		$largeurCellule=100/$colonne."%";
		//reset($tab);
		echo "<body><table class=cadre width=$largeur%  ><tr>";
		 //affiche premiere ligne en fixant largeur colonnes: nom des colonnes= nom des attributs du premier objet
			/*	
			cette boucle affiche la première ligne avec les attributs de l'objet comme titre de colonne
			ceci sans connaître les noms des attributs
			 foreach($tab[0] as $attribut => $val) {
				echo "<th class= titre width=$largeurCellule > $attribut</th>";
				}
			*/
		// autre façon en pouvant différencier les noms des colonnes
		echo "<th class= titreGauche width=$largeurCellule > <a href=./controller.php?cas=nom target=controller >Nom</a></th>";
		echo "<th class= titre width=$largeurCellule > <a href=./controller.php?cas=age target=controller >Age</a></th>";
		echo "<th class= titre width=$largeurCellule > <a href=./controller.php?cas=ville target=controller >Ville</a></th>";
		echo "<th class= titre width=$largeurCellule > <a href=./controller.php?cas=score target=controller >Score</a></th>";
		echo "<th class= titre width=$largeurCellule > <a href=./controller.php?cas=id target=controller >Id</a></th>";
		echo "<th class= titreDroite width=$largeurCellule > <a href=./controller.php?cas=pass target=controller >Mot de passe</a></th></tr>";

		//affiche un objet par ligne: les valeurs de ses attributs-------------------------

		  foreach ($tab as $e)
		  {
			echo "<tr>";
			echo "<td align=center>$e->Nom </td>";
			echo "<td align=center>$e->Age </td>";
			echo "<td align=center>$e->Ville </td>";
			echo "<td align=center>$e->Score </td>";
			echo "<td align=center>$e->id </td>";
			echo "<td align=center>$e->passe </td>";
				// boucle permettant d'afficher les valeurs des attributs 
				//sans connaitre les noms des attributs
				/*foreach ($e as $attribut => $val)
				   	{
					echo "<td align=center>$val </td>";
					}*/
	   		echo "</tr>";
		
	 		}// fin foreach $tab
	 		echo "<input type=button value=Imprimer onclick='javascript:printSheet();'' target=controller >";
		 echo "</table></body></html>";
		}// fin if isarray
	}
else echo "<script language=javascript>alert(\"Aucun resultat pour votre demande\");</script>";
}

//----------------------------------------------

function formulaireModif($t)
{
//print_r($t);
$this->enteteHtml();
echo " <center>
<table  class=cadre width=60%  >
<tr ><td align=center>
<form name= formulaire action=./controller.php  method=post target=controller> 
nom:<input type=text size=10 name=nom value=$t->Nom>
ville:<input type=text size=10 name=ville value=$t->Ville>
score:<input type=text size=5 name=score value=$t->Score>
Age:<input type=text size=5 name=age value=$t->Age>
<input type=hidden name=cas value=VoiciLesModif>
<input type=hidden name=ide value=$t->id></td></tr>
<tr><td align=center>
Code:<input type=password name=passe value=$t->passe></td></tr>
<tr><td align=center>
<input type=button value=Ok onclick='javascript:Validation(nom.value, ville.value, score.value, age.value, passe.value);'>
</form></td></tr></table></center>";
}
//----------------------------------------------
function afficheMess($t)
{
echo $t;
}
//----------------------------------------------
function afficheMessJson($t)
{
echo json_encode($t);
}

//----------------------------------------------

function formulaireNouveau()
{
$this->enteteHtml();
echo " <center>
<table  class=cadre width=60%  >
<tr ><td align=center>
<form name= formulaire action=./controller.php  method=post target=controller> 
nom:<input type=text size=10 name=nom>
ville:<input type=text size=10 name=ville>
score:<input type=text size=5 name=score>
Age:<input type=text size=5 name=age>
<input type=hidden name=cas value=nouveau></td></tr>
<tr><td align=center>
Code:<input type=password name=passe></td></tr>
<tr><td align=center>
<input type=button value=Ok onclick='javascript:Validation(nom.value, ville.value, score.value, age.value, passe.value);'>
</form></td></tr></table></center>";
}


//----------------------------------------------
function enteteHtml()
{
echo '
<!DOCTYPE html>
<html lang="fr">
<head>
<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" media="screen" href="monstyle.css">
<link rel="stylesheet" type="text/css" media="print" href="impression.css">
<script language=javascript src="mesfonctions.js"></script>
<script src="/libJquery/jquery-1.11.2.js"></script>
</head>';
}
//----------------------------------------------

function exportToCSV()
{
	//Sql : "SELECT * FROM jeu"
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=jeu.csv');
}


};// fin de classe Vue
?>
