<div class='form-group'>
	
		<form method='get' action='controleurs/c_verifConnexion.php'>
			<label for='login_producteur'>Login</label>
			<input name='login_producteur' id='login' type='text' class='form-control' size='30' maxlength='45' />
			
			<label for='mdp_producteur'>Mot de passe</label>
			<input name='mdp_producteur' id='mdp' class='form-control' type='password' value='' size='30' maxlength='45' />
			
			<input type='submit' value='Valider' class='btn btn-primary'>
			<input type='reset' value='Annuler' class='btn btn-primary'>
		</form>
		</br>
		<p>Pas de compte ?</p>
		<a id='inscription_consommateur' href='index.php?uc=connexion&action=formInscription'>Cliquez ici!</a>

		</div>