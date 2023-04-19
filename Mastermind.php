<?php
include_once("CombiMM.php");
include_once("EvalCombiMM.php");
Class Mastermind{
	
	const TAILLE_MM = 10 ;
	private   $combiGagnante;
	protected 	$lesPropositions;
	protected 	$lesEvaluations;
	
	public function __construct(){
		$this->combiGagnante=CombiMM::initAleatoire();
	}
	public function __destruct()
	{
		unset($this);
	}
	public function getCombiGagnante(){
		return $this->combiGagnante;
	}
	
	public function getProposition($indice)
	{
		return $this->lesPropositions[$indice];
	}
	public function getEvaluation($indice)
	{
		return $this->lesEvaluations[$indice];
	}
	public function ajouteProposition(CombiMM $cmm)
	{
		if(count($this->lesPropositions)<Mastermind::TAILLE_MM)
		{
			$this->lesPropositions[]=$cmm;
			Mastermind::evalueDernierProposition();
		}
		
	}	
	public function evalueDernierProposition(){
		$nbBP=$this->lesPropositions[count($this->lesPropositions)-1]->evalueCasesIdentiques($this->combiGagnante);
		$nbMP=$this->lesPropositions[count($this->lesPropositions)-1]->evalueCasesMalPlacees($this->combiGagnante);
		//echo $nbBP."||".$nbMP;
		$this->lesEvaluations[]=new EvalCombiMM($nbBP,$nbMP);
		echo count($this->lesEvaluations);
		if(count($this->lesEvaluations)==10)
		{
			Mastermind::finPartie();
		
		}elseif($this->lesEvaluations[count($this->lesEvaluations)-1]->getNbBienPlaces()==4 )
		{	Mastermind::finPartie();
		} else{}
	}
	public function isPropositionGagnante()
	{
		if($this->lesPropositions[count($this->lesPropositions)-1]->evalueCasesIdentiques($this->combiGagnante)==4)
			return true;
		else
			return false;
	}
	public function finPartie()
	{
		if(count($this->lesPropositions)!=0 && Mastermind::isPropositionGagnante()==true )
		{
			echo "<div class=\"row well\">";
			echo "La Combinaison Gagnante est : ".$this->combiGagnante;
			echo "</br>Vous Avez Gagnez";
			echo "</div>";
			return true;
		}else {
			echo "<div class=\"row well\">";
			echo "La Combinaison Gagnante est : ".$this->combiGagnante;
			echo "</br>Vous Avez Perdu";
			echo "</div>";
			return false;
		}
		
	}
	public function __toString(){
		$sRet="";
		return $sRet;
	}

}
	/**************SCRIPT********************/
	/*$mm= new Mastermind();
	
	echo "Combinaison Gagnante :".$mm->getCombiGagnante()."</br>";
	for($i=0;$i<Mastermind::TAILLE_MM;$i++)
	{
		$newCombimm=CombiMM::initAleatoire();
		echo "nouvelle Combinaison enregistrée : ".$newCombimm;
		$mm->ajouteProposition($newCombimm);
		//if($i==8) $mm->ajouteProposition($mm->getCombiGagnante());
		echo "==> Evaluation : ".$mm->getEvalution($i)."</br>";
		
	}*/
	
	
	
	
	
?>
