<?php

Class EvalCombiMM{
	protected $nbBienPlaces	=0;
	protected $nbMalPlaces	=0;
	
	public function __construct($nbBP,$nbMP){
		$this->nbBienPlaces	=$nbBP;
		$this->nbMalPlaces	=$nbMP;
	}
	public function __toString(){
		$sRet="";
		$sRet.="nbBienPlaces :".$this->nbBienPlaces;
		$sRet.=" nbMalPlaces  :".$this->nbMalPlaces;
		return $sRet;
	}
	public function getNbBienPlaces(){return $this->nbBienPlaces;}
	public function getNbMalPlaces(){return $this->nbMalPlaces;}
	public function setNbBienPlaces($nbBP){$this->nbBienPlaces=$nbBP;}
	public function setNbMalPlaces($nbMP){$this->nbMalPlaces=$nbMP;}
}
	/**************SCRIPT********************/
?>
