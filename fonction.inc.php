<?php 
	include_once("MM_UI.php");
	function enTete($titre) 
	{
		echo"<!DOCTYPE HTML>\n";
		echo'<html lang="fr">';
		echo'	<head>';
		echo'		<title>'.$titre.'</title>';
		
		echo'		<link rel="shortcut icon" href="bootstrap3/img/MMShortcut.png">
					<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap-lightbox.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap-responsive.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap-theme.css"/>
						<meta charset="UTF-8"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/MMStyle.css"/>
						
						<script src="bootstrap3/js/bootstrap-lightbox.js"></script>
						<script src="bootstrap3/js/bootstrap-carousel.js"></script>
						<script src="bootstrap3/js/allFunction.js"></script>

						<script src="bootstrap3/js/jquery.js"></script>
						
						<script src="bootstrap3/js/bootstrap.js"></script>
						<script type="text/javascript">
							$(document).ready(function(){
								$(\'.carousel\').carousel();
							});
						</script>
					</head>';
		echo '	<body id="haut">';
		//DEBUT DU CONTAINER
		echo'		<div class="container">';
		echo'			<div class="">
							<p id="aLogo">
								<a href="index.php">
									<img alt="logo" width="100%" src="bootstrap3/img/logoMM.png"/>
								</a>
							</p>
						</div>';
	}
	function nav()
	{
		echo'			<div class="span3 well">
							<form method="POST" class="form" action="index.php" >
								<input type="submit" value="Nouvelle Partie" class="form-control btn btn-default" name="newGame" />
							</form>

							<button data-toggle="modal" data-target="#instructions" class="form-control btn btn-default">Instructions</button>
								<div class="modal fade" id="instructions" tabindex="-1" role="dialog"  aria-hidden="false">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 style="text-align:center;" class="modal-title" id="instructions">
													Instructions
												</h4>
											</div>
											<div class="row-fluid">';
												echo'<div class="well">
															L\'objectif du MasterMind est de retrouver en 10 essais maximum une combinaison constituée </br>
															de 4 pions de couleurs choisis parmi les 8 disponibles (il est possible d\'utiliser plusieurs</br> 
															pions de même couleur). À chaque étape du jeu, le joueur est informé du nombre de pions bien </br>
															placés et du nombre de pions mal placés de sa proposition. La partie prend fin si le joueur </br>
															trouve la combinaison exacte ou s\'il échoue à la découvrir au bout de ses dix essais.
															<li>Noir => Bonnes couleurs Bien Placées</li>
															<li>Gris => Bonnes couleurs Mal Placées</li>
													</div>';
										echo'</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
											</div>
										</div>
									</div>
								</div>';	
		echo'			</div>';
	}

	function pied() 
	{
		echo'			<div class="row">
							
						</div>
					</div>';//POUR LE CONTAINER
		echo'	</body>';	
		echo'</html>';
	}
?>