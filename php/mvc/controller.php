<?php
print_r($_REQUEST);

include("model.php");
include("view.php");

$maquette= new Model();
$maVue= new Vue();
$cas=0;
if (isset($_REQUEST["cas"])) $cas=$_REQUEST["cas"];    

if (isset($_REQUEST["score"])) $score=$_REQUEST["score"];
if (isset($_REQUEST["age"])) $age=$_REQUEST["age"];
if (isset($_REQUEST["ide"])) $ide=$_REQUEST["ide"];
if (isset($_REQUEST["choix"])) $choix=$_REQUEST["choix"];
if (isset($_REQUEST["ville"])) $ville=$_REQUEST["ville"];
if (isset($_REQUEST["nom"])) $nom=$_REQUEST["nom"];
if (isset($_REQUEST["passe"])) $passe=$_REQUEST["passe"];
// quel lien nous interroge?
switch($cas)
 {
  case "score":
    $t=$maquette->getAllOrderBy("Score");
    $maVue->afficheTab($t,100); 
      break;
  case "nom":
    $t=$maquette->getAllOrderBy("nom");
    $maVue->afficheTab($t,100); 
    break;
  case "ville":
    $t=$maquette->getAllOrderBy("ville");
    $maVue->afficheTab($t,100); 
    break;
  case "age":
    $t=$maquette->getAllOrderBy("age");
    $maVue->afficheTab($t,100); 
    break;
  case "id":
    $t=$maquette->getAllOrderBy("id");
    $maVue->afficheTab($t,100); 
    break;
  case "pass":
    $t=$maquette->getAllOrderBy("passe");
    $maVue->afficheTab($t,100); 
    break;
  case "villePrecise":
    if (!empty($ville))
    {
	  $t=$maquette->getAllByVille($ville);
	  //var_dump($t);
    $maVue->afficheTab($t,100); 
    }
    break;  
  case "scoreInferieur":
    if (!empty($score))
    {
    $t=$maquette->getAllByScoreInferieur($score);
    //var_dump($t);
    if($t)
      {
       $maVue->afficheTab($t,100); 
      }
    }
    break;  
  case "scoreAge":
    if (!empty($score)&&!empty($age))
    {
     $t=$maquette->getAllByScoreAge($score, $age);
    //var_dump($t);
       $maVue->afficheTab($t,100); 
     }
    break;
  case "maxi":
      $t=$maquette->getMax();
    //var_dump($t);
       $maVue->afficheTab($t,100); 
      break;
  case "mini":
   	$t=$maquette->getMin();
    //var_dump($t);
       $maVue->afficheTab($t,100); 
      break;
  case "jeune":
    $t=$maquette->getJeune();
    //var_dump($t);
       $maVue->afficheTab($t,100); 
      break;
  case "vieux":
    $t=$maquette->getVieux();
    //var_dump($t);
       $maVue->afficheTab($t,100); 
    break;
   case "modifier":
     if (!empty($ide))
     {
	
      if ($choix=="supprimer")
       { 
         //???????????????????
         $tab=$maquette->suppr($ide);
         $t=$maquette->getAllOrderBy("id");
  	  	 $maVue->afficheTab($t,100);
       }
      if ($choix=="modifier")
       {
		//echo "modifier";
        $tab=$maquette->getAllById($ide);
		//var_dump($tab);
        $maVue->formulaireModif($tab[0]);
       }
     }
    break;
  case "insere":
      $maVue->formulaireNouveau();
    break;
  case "VoiciLesModif":
     if (!(empty($nom)||empty($ville)||empty($score)||empty($age)))
    {
      //var_dump($_REQUEST);
	  //$requete="UPDATE jeu SET nom='$nom',ville='$ville',score='$score',Age='$age' ,passe=MD5('$passe') WHERE id=$ide";
	  $maquette->VoiciLesModif($nom, $ville, $score, $age, $passe, $ide);
	  $t=$maquette->getAllOrderBy("id");
  	  $maVue->afficheTab($t,100);
    }
	else {
           $maVue->afficheMess('Paramètre manquant');
         }
	break;	
  case "nouveau":
   
    if (!(empty($nom)||empty($ville)||empty($score)||empty($age)))
    {
       
      //$requete="INSERT INTO jeu (nom,ville,score,Age,passe) VALUES('$nom','$ville','$score','$age',MD5('$passe'))";
      $maquette->ajout($nom, $ville, $score, $age, $passe);
	  $t=$maquette->getAllOrderBy("id");
  	  $maVue->afficheTab($t,100);
        
    } 
     else {
           $maVue->afficheMess('Paramètre manquant');
          }
    break;

   default:
	
	$t=$maquette->getAllOrderBy("id");
  	$maVue->afficheTab($t,100); 
 }



//----------------------------------------------

?> 
    
    

 
