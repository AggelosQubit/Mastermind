<?php
	include_once("CombiMM.php");
	
class BoiteCombiMM{
	
	protected $cmm;
	
	public function __construct ($cmm){
		$this->cmm=$cmm;
	}
	
	public function __toString(){
		$sRet="";
		
		for($i=0;$i<CombiMM::TAILLE_COMBIMM;$i++){
			$sRet.="<td>".$this->cmm->getCouleur($i)."</td>";
		}
		
		return $sRet;
	}
}
	/*$maCombiMM=CombiMM::initAleatoire();
	$maBoiteCombiMM=new BoiteCombiMM($maCombiMM);
	echo $maBoiteCombiMM;*/
?>