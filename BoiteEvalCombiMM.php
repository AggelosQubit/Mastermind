<?php
include_once("EvalCombiMM.php");
	
class BoiteEvalCombiMM{
	
	protected $ecmm;
	
	public function __construct ($ecmm){
		$this->ecmm=$ecmm;
	}
	
	public function __toString(){
		$sRet="";
		$sRet.="<td><img src=\"mmEval/".$this->ecmm->getNbBienPlaces()."BCBP.png\" /></td>";
		$sRet.="<td><img src=\"mmEval/".$this->ecmm->getNbMalPlaces()."BCMP.png\" /></td>";
		return $sRet;
	}
}

	/*$EvalCombiMM=new EvalCombiMM(4,2);
	$maBoiteEvalCombiMM=new BoiteEvalCombiMM($EvalCombiMM);
	echo $maBoiteEvalCombiMM;*/
?>