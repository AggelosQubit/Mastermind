<?php

	include_once("Mastermind.php");
	include_once("BoiteCombiMM.php");
	include_once("BoiteEvalCombiMM.php");
	
class MM_UI{
	
	protected $mm;
	
	public function __construct ($mm){
		$this->mm=$mm;
	}
	
	public function getDivFormulaire(){
		echo"<form method=\"POST\" class=\"form\" action=\"index.php\" >
				<caption>Nouvelle Combinaison</caption>
				<table class=\"table\">
					<tr>";
		
		for($i=0;$i<CombiMM::TAILLE_COMBIMM;$i++){
			echo"		<td><input type=\"number\" class=\"form-control\"  step=\"1\" min=\"1\" max=\"8\"       name=\"valeur".$i."\"	required/></td>";
		}
		echo "			<td><input type=\"submit\" class=\"form-control btn btn-primary\"  value=\"Proposer\"   name=\"Proposer\"  	 	/></form></td>";
		echo "			<td>
							<form method=\"POST\" class=\"form\" action=\"index.php\" >
								<input type=\"submit\" class=\"form-control btn btn-danger\"   value=\"Abandonner\" name=\"Abandonner\"		/>
							</form>
						</td>";
		echo "		</tr>
				</table>
			";
	}
	public function getDivHistorisque(){
		
		echo "<table class=\"table\">";
		echo "	<tr>
					<th>1er</th>
					<th>2em</th>
					<th>3em</th>
					<th>4em</th>
					<th></th>
					<th></th>
				</tr>";
		$i=0;
		while(@$this->mm->getProposition($i)!=NULL){
			echo "<tr>";
				//$lesPropositions;$lesEvaluations;
				echo new BoiteCombiMM($this->mm->getProposition($i));
				echo new BoiteEvalCombiMM($this->mm->getEvaluation($i));
			echo "</tr>";
			$i++;
		}
		echo "</table>";
	}
}

	/*$mm= new Mastermind();
	
	echo "Combinaison Gagnante :".$mm->getCombiGagnante()."</br>";
	for($i=0;$i<Mastermind::TAILLE_MM;$i++)
	{
		$newCombimm=CombiMM::initAleatoire();
		$mm->ajouteProposition($newCombimm);
		//if($i==8) $mm->ajouteProposition($mm->getCombiGagnante());
	}
	$mm_ui=new MM_UI($mm);
	$mm_ui->getDivHistorisque();
	$mm_ui->getDivFormulaire();*/
?>