<?php
include("daoJeu.php");

//---------------------------------------------------------------------
class Model{

private	$monDao;

//---------------------------------------------------------------------
function __construct()
	{
	$this->monDao=new DaoJeu();
	}
//---------------------------------------------------------------------
function getAllOrderBy($ordre)
	{
	return $this->monDao->getAllOrderBy($ordre);
	}
//---------------------------------------------------------------------
function getAllByVille($ville)
	{
	return $this->monDao->getAllByVille($ville);
	}
//---------------------------------------------------------------------
function getAllById($id)
	{
	return $this->monDao->getAllById($id);
	}
//---------------------------------------------------------------------
function getVilleByVilleStartWith($ville)
	{
	$t=$this->monDao->getVilleByVilleStartWith($ville);
	return $t;
	}
//---------------------------------------------------------------------
function getAllByScoreInferieur($score)
	{
	$t=$this->monDao->getAllByScoreInferieur($score);
	return $t;
	}
	//---------------------------------------------------------------------
function getAllByScoreAge($score, $age)
	{
	$t=$this->monDao->getAllByScoreAge($score, $age);
	return $t;
	}
	//---------------------------------------------------------------------
function getJeune()
	{
	$t=$this->monDao->getJeune();
	return $t;
	}
	//---------------------------------------------------------------------
function getVieux()
	{
	$t=$this->monDao->getVieux();
	return $t;
	}
	//---------------------------------------------------------------------
function getMin()
	{
	$t=$this->monDao->getMin();
	return $t;
	}
	//---------------------------------------------------------------------
function getMax()
	{
	$t=$this->monDao->getMax();
	return $t;
	}
	//---------------------------------------------------------------------
function VoiciLesModif($nom, $ville, $score, $age, $passe, $ide)
	{
	$this->monDao->VoiciLesModif($nom, $ville, $score, $age, $passe, $ide);
	}
	//---------------------------------------------------------------------
function suppr($ide)
	{
	$this->monDao->suppr($ide);
	}
	//---------------------------------------------------------------------
function ajout($nom, $ville, $score, $age, $passe)
	{
	$this->monDao->ajout($nom, $ville, $score, $age, $passe);
	}
};// fin de classe

?>
