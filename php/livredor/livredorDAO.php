<head><link rel="stylesheet" type="text/css" media="screen" href="styleLivreDor.css" >
<meta charset="ISO-8859-1"></head>
<?php

class livreDorDAO extends mysqli {
    public function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);

        if ($this->connect_error) {
   			 die('Erreur de connexion (' . $this->connect_errno . ') '
            . $this->connect_error);
			}
		
    }
	//----------------------
  	function ajoute($nom,$lemail,$message,$table,$fichier, $ip) // On vérifie que les champs ne sont pas vides
   	{
	
   	// insere un nouvel enregistrement
   	if (!empty($nom) && !empty($lemail) && !empty($message)) {

    $date=time();
	if(!empty($fichier)) $query = "insert into $table  (date, nom, lemail, message, emplacement, adresse_ip) VALUES ('$date', '$nom', '$lemail', '$message', '$fichier', '$ip');"; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	else $query = "insert into $table  (date, nom, lemail, message, adresse_ip) VALUES ('$date', '$nom', '$lemail', '$message', '$ip');";
   //echo "<br>q=$query";
   // Execute la requete 
       $result = $this->query($query) or die('Erreur SQL');
        return false;
    } 
	return true;
   }
//----------------------
	function selectMessageParDate()
	{
	 $query = "SELECT date,nom,lemail,message,emplacement FROM bavardage ORDER BY date DESC"; 
 	//var_dump($query);
   // Execute la requete precedente
       $result = $this->query($query) or die('Erreur sur requête SQL : ');
 
	$i=0;
   // Définit la boucle : tant qu'il y a des messages dans la BDD
  	 while ($val = $result->fetch_object()) {
	$tableObjets[$i++]=$val;
	}
	//var_dump($tableObjets);
	return $tableObjets;
	}
	//------------------------------
	function selectMessageParNom()
	{
	 $query = "SELECT date,nom,lemail,message,emplacement FROM bavardage ORDER BY nom"; 
 	//var_dump($query);
   // Execute la requete precedente
       $result = $this->query($query) or die('Erreur sur requête SQL : ');
 
	$i=0;
   // Définit la boucle : tant qu'il y a des messages dans la BDD
  	 while ($val = $result->fetch_object()) {
	$tableObjets[$i++]=$val;
	}
	//var_dump($tableObjets);
	return $tableObjets;
	}

//----------------------
//----------------------
	function cherche($champ,$valeur,$table)
	{
	//echo "champ=$champ val=$valeur";
	// selectionne message, date, et soit le nom soit l'adresse email

   $query = "select message,date,$champ,emplacement from $table where $champ='$valeur'";// where !!!!!!!!!!!!!!!!!!!!!!!!!
 	
   // Execute la requete precedente
     $result = $this->query($query) or die('Erreur SQL : ');
      $i=0;
      //var_dump($result);
      if($result->num_rows != 0)
     {
	 while ($val = $result->fetch_object()) 
	 	{
			$tableObjets[$i++]=$val;
		}
	} else
	{
		$tableObjets=NULL;
	}
	//var_dump($tableObjets);
	return $tableObjets;//if(count($tableObjets)!= 0) return $tableObjets;

	}
//----------------------

}// fin de la classe livreDor


?>
