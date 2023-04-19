<?php
	
	include("fonction.inc.php");session_start();
	entete("Mastermind");
	contenu();
	pied();
	
	function contenu()
	{
		if(isset($_POST['newGame']))
		{
			//ALORS ON A CLIQUER SUR 'Nouvelle Partie' et on detruit et recree une session
			if(isset($_SESSION['mm'])){
				if (ini_get("session.use_cookies")) {
					$params = session_get_cookie_params();
					setcookie(session_name(), '', time() - 42000,
						$params["path"], $params["domain"],
						$params["secure"], $params["httponly"]
					);
				}
				session_destroy();	
			} 
			$_SESSION['mm']= new Mastermind();
			$_SESSION['mm_ui']=new MM_UI($_SESSION['mm']);
			header("Location:index.php"); /* Redirection du navigateur */
			exit;
		}
		echo"<div class=\"row\">";
		nav();
		if(isset($_SESSION['mm']) && isset($_SESSION['mm_ui']))
		{
			if( isset($_POST['valeur0']) && 
				isset($_POST['valeur1']) && 
				isset($_POST['valeur2']) && 
				isset($_POST['valeur3'])
			  )
			{	
				$newCombimm=new CombiMM($_POST['valeur0'],$_POST['valeur1'],$_POST['valeur2'],$_POST['valeur3']);
				$_SESSION['mm']->ajouteProposition($newCombimm);
			}

			echo"	<div class=\"span8 well\" >";
			if(isset($_POST['Abandonner']) || $_SESSION['mm']->getProposition(Mastermind::TAILLE_MM-1)!=NULL){
				$_SESSION['mm']->finPartie();
			}			
			echo"		<h4>Historique de la partie</h4>";
						
						if($_SESSION['mm']->getProposition(0)!=NULL)
						{
							$_SESSION['mm_ui']->getDivHistorisque();	
						}
						$_SESSION['mm_ui']->getDivFormulaire();
			echo"	</div>";
			echo"</div>";
		}
		
	}
	
?>