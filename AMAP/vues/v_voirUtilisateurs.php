<div class="container">
	<div class="row">	
		  <div class="col-sm-10 col-xs-12">
			<?php
				if (isset($_SESSION['id_Type_utilisateur']) && $_SESSION['id_Type_utilisateur']==1  ) {
				foreach($utilisateurs as $cle => $utilisateur)
				{
					
				echo "<div class='col-12 col-sm-10 well'>
						
							<div class='row'>
								<div class='well well-sm' id='nom_utilisateur".$utilisateur['id']."'>".$utilisateur['nom']." ".$utilisateur['prenom']."</div>
                                                                <div class='well well-sm' id='type_utilisateur".$utilisateur['id']."'>".$utilisateur['libelle']."</div>
							</div>
							<div class='row'>
                                                        <form method='post' action='index.php?uc=GererUtilisateur&action=Modifier&idUtilisateur=".$utilisateur['id']."'>
                                                            <input type='submit' id='button_ModifierUtilisateur".$utilisateur['id']."' class='form-control input-sm' value='Modifier Utilisateur'></input>
                                                        </form>
                                                        <form method='post' action='index.php?uc=GererUtilisateur&action=Supprimer&idUtilisateur=".$utilisateur['id']."'>
                                                            <input type='submit' id='button_SupprimerUtilisateur".$utilisateur['id']."' onClick='return verif()' class='form-control input-sm' value='Supprimer Utilisateur'></input>
                                                        </form>
								
                                                        </div>
					</div>";
					
				}
                                }
                                
			?>
			
		  </div>
	</div>
</div>