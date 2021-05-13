<?php
include ("MyPDO.php");
//*****************************************************************************************
class DaoJeu extends MyPDO
{

	// constructeur qui appelle constructeur de la super classe qui effectue la connexion
	// avec les variables contenues dans login.php
    function __construct()
	{
	include ("login.php");
	parent::__construct('mysql:host='.$serveur.';dbname='.$mabase,$login, $motdepasse);
    } // fin constructeur
//---------------------------------------------------------------------
  function getAllOrderBy($ordre)
	{ 
	$requete="SELECT Nom,Age,Ville,Score,id,passe FROM jeu order by ".$ordre;
	$getAllOrderBy=$this->prepare($requete);
	$getAllOrderBy->execute();
	$t=$getAllOrderBy->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getAllByVille($ville)
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getAllByVille=$this->prepare("SELECT * FROM jeu WHERE ville= ?");
	$getAllByVille->execute(array($ville));
	$t=$getAllByVille->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getAllById($id)
	{
	$getAllById=$this->prepare("SELECT * FROM jeu WHERE id= ?");
	$getAllById->execute(array($id));
	$t=$getAllById->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getVilleByVilleStartWith($ville)
	{
	$getVilleByVilleStartWith=$this->prepare("SELECT distinct ville FROM jeu WHERE ville like ? ");
	$ville=$ville.'%';
	$retour=array();
	$getVilleByVilleStartWith->setFetchMode(PDO::FETCH_NUM);
	$getVilleByVilleStartWith->execute(array($ville));
	for ($i=0;$i<$getVilleByVilleStartWith->rowCount();$i++)
		{
		$retour=array_merge($retour,$getVilleByVilleStartWith->fetch());
		}
	return $retour;
	}
	function getNomByNomStartWith($nom)
	{
	$getNomByNomStartWith=$this->prepare("SELECT distinct nom FROM jeu WHERE nom like ? ");
	$nom=$nom.'%';
	$retour=array();
	$getNomByNomStartWith->setFetchMode(PDO::FETCH_NUM);
	$getNomByNomStartWith->execute(array($ville));
	for ($i=0;$i<$getNomByNomStartWith->rowCount();$i++)
		{
		$retour=array_merge($retour,$getNomByNomStartWith->fetch());
		}
	return $retour;
	}
//---------------------------------------------------------------------
	function getAllByScoreInferieur($score)
	{
	$getAllByScoreInferieur=$this->prepare("SELECT * FROM jeu WHERE score< ? ORDER BY score");
	$getAllByScoreInferieur->execute(array($score));
	$t=$getAllByScoreInferieur->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getAllByScoreAge($score, $age)
	{
	$getAllByScoreAge=$this->prepare("SELECT * FROM jeu WHERE score< ? AND age< ? ORDER BY score"); 
	$getAllByScoreAge->execute(array($score, $age));
	$t=$getAllByScoreAge->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getJeune()
	{
	$getAllJeune=$this->prepare("SELECT * FROM jeu WHERE age = (SELECT MIN(age) FROM jeu)"); 
	$getAllJeune->execute();
	$t=$getAllJeune->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getVieux()
	{
	$getAllVieux=$this->prepare("SELECT * FROM jeu WHERE age = (SELECT MAX(age) FROM jeu)"); 
	$getAllVieux->execute();
	$t=$getAllVieux->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getMin()
	{
	$getAllByScoreMin=$this->prepare("SELECT * FROM jeu WHERE score = (SELECT MIN(score) FROM jeu)"); 
	$getAllByScoreMin->execute();
	$t=$getAllByScoreMin->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function getMax()
	{
	$getAllByScoreMax=$this->prepare("SELECT * FROM jeu WHERE score = (SELECT MAX(score) FROM jeu)"); 
	$getAllByScoreMax->execute();
	$t=$getAllByScoreMax->fetchAll(PDO::FETCH_OBJ);
	//var_dump($t);
	return $t;
	}
//---------------------------------------------------------------------
	function VoiciLesModif($nom, $ville, $score, $age, $passe, $ide)
	{
	$VoiciLesModif=$this->prepare("UPDATE jeu SET nom=?, ville=?, score=?, age=?, passe=MD5(?) WHERE id=?"); 
	$VoiciLesModif->execute(array($nom, $ville, $score, $age, $passe, $ide));
	}
//---------------------------------------------------------------------
	function suppr($ide)
	{
	$suppr=$this->prepare("DELETE FROM jeu WHERE id=?"); 
	$suppr->execute(array($ide));
	}
//---------------------------------------------------------------------
	function ajout($nom, $ville, $score, $age, $passe)
	{
	$ajout=$this->prepare("INSERT INTO jeu (nom,ville,score,Age,passe) VALUES(?,?,?,?,MD5(?))"); 
	$ajout->execute(array($nom, $ville, $score, $age, $passe));
	}
//---------------------------------------------------------------------
	
};// fin de classe
