<?php

Class CombiMM{
	
	const TAILLE_COMBIMM=4;
	const NB_COULEUR 	=8;
	protected $lesValeurs;
	
	public static function initAleatoire(){
		/**
			INITALEATOIRE EST UNE MÉTHODE DE CLASSE QUI RETOURNE 
			UNE INSTANCE DE COMBIMM GÉNÉRÉE ALÉATOIREMENT
		**/
		//rand ( 1, 8 );
		$val1=rand(1,CombiMM::NB_COULEUR);
		$val2=rand(1,CombiMM::NB_COULEUR);
		$val3=rand(1,CombiMM::NB_COULEUR);
		$val4=rand(1,CombiMM::NB_COULEUR);
		
		//echo "|".$val1."|".$val2."|".$val3."|".$val4."|";
		return new COMBIMM($val1,$val2,$val3,$val4);
	}
	public function __construct($val1,$val2,$val3,$val4){
		$this->lesValeurs[]=$val1;
		$this->lesValeurs[]=$val2;
		$this->lesValeurs[]=$val3;
		$this->lesValeurs[]=$val4;
		//print_r($this->lesValeurs);
	}
	public function __destruct()
	{
		unset($this);
	}
	public function __toString(){
		$sRet="";
		$sRet.="|".	$this->lesValeurs[0]."|".
					$this->lesValeurs[1]."|".
					$this->lesValeurs[2]."|".
					$this->lesValeurs[3]."|";
		return $sRet;
	}
	/*******************SETTERS GETTERS***********************/
	public function getCouleur($pos){
		return $this->lesValeurs[$pos];
	}
	public function setCouleur($pos,$couleur){
		$this->lesValeurs[$pos]=$couleur;
	}
	/******************************************************/
	public function evalueCasesIdentiques(CombiMM $cmb){
		//noir==>meme couleur meme position dans les deux combinaisons
		$nbECI=0;
		for($i=0;$i<CombiMM::TAILLE_COMBIMM;$i++){
			if($this->lesValeurs[$i]==$cmb->getCouleur($i))
				$nbECI++;
		}
		return $nbECI;
	}
	public function evalueCasesMalPlacees(CombiMM $cmb){
		//gris==> meme couleur mal placés
		$nbECMP=0;
		for($i=0;$i<CombiMM::TAILLE_COMBIMM;$i++)
		{	
			$hit=0;
			for($j=0;$j<CombiMM::TAILLE_COMBIMM;$j++)
			{
				//echo $hit;
				if( $cmb->getCouleur($i)==$this->lesValeurs[$j])
				{	
					if($i == $j) $hit=1;
					
					if($hit==0)//ce qui signifie que le nombre $this->lesValeurs[$i] à deja été remarque une fois	
					{
						$hit=1;
						$nbECMP++;
					}
				}
			}
		}
		return $nbECMP++;
	}
}
	/**************SCRIPT********************/
	/*$maCombiMM=CombiMM::initAleatoire();
	echo "Tableau commence à 0</br>";
	echo "Combinaision aléatoire  : ".$maCombiMM."</br>";
	echo "Couleur à la position 2 : ".$maCombiMM->getCouleur(2)."</br>";
	$maCombiMM->setCouleur(2,3);
	$maCombiMM->setCouleur(3,7);
	
	echo "setCouleur(2,3);setCouleur(3,7);</br>";
	echo "Combinaision aléatoire apres setCouleur".$maCombiMM."</br>";
	
	$maCombiMM2=new COMBIMM(2,3,4,5);
	echo "maCombiMM2 =".$maCombiMM2."</br>";
	echo "evalueCasesIdentiques( ".$maCombiMM." , ".$maCombiMM2." ) :".$maCombiMM->evalueCasesIdentiques($maCombiMM2)."</br>";
	echo "evalueCasesMalPlacees( ".$maCombiMM." , ".$maCombiMM2." ) :".$maCombiMM->evalueCasesMalPlacees($maCombiMM2)."</br>";
*/
	
	
	
	
	
	
	
?>
