<p>Inscription</p>
<?php
	if ( isset($_SESSION['alreadyExists']) && $_SESSION['alreadyExists'] )
	{
?>
	<div class='form-group'>
		<form method='POST' action='index.php?uc=connexion&action=inscription'>
				<label for='login_utilisateur'>Login</label>
				<input name='login_utilisateur' id='login_utilisateur' type='text' class='form-control' value='' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkLogin()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='nom_utilisateur'>Nom</label>
				<input name='nom_utilisateur' id='nom_utilisateur' type='text' class='form-control' value='<?php echo $_SESSION['nom']; ?>' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_utilisateur'>Prenom</label>
				<input name='prenom_utilisateur' id='prenom_utilisateur' type='text' class='form-control' value='<?php echo $_SESSION['prenom']; ?>' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_utilisateur'>Adresse</label>
				<input name='adresse_utilisateur' id='adresse_utilisateur' type='text' class='form-control' value='<?php echo $_SESSION['adresse']; ?>' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_utilisateur'>Mail</label>
				<input name='mail_utilisateur' id='mail_utilisateur' type='text' class='form-control' value='' placeholder="Le login et/ou le mail que vous avez rentré précédemment existe(nt) déjà" size='30' maxlength='45' onblur="checkMail()" style="border-color: rgba(255, 0, 0, 1); box-shadow: 0 0 8px rgba(255, 0, 0, 1);">
				
				<label for='tel_utilisateur'>Tel</label>
				<input name='tel_utilisateur' id='tel_utilisateur' type='text' class='form-control' value='<?php echo $_SESSION['tel']; ?>' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_utilisateur'>Code postal</label>
				<input name='code_postal_utilisateur' id='code_postal_utilisateur' type='text' class='form-control' value='<?php echo $_SESSION['codePostal']; ?>' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_utilisateur'>Ville</label>
				<input name='ville_utilisateur' id='ville_utilisateur' type='text' class='form-control' value='<?php echo $_SESSION['ville']; ?>' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='mdp_utilisateur'>MDP</label>
				<input name='mdp_utilisateur' id='mdp_utilisateur' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkPswd()">
				confirmer MDP
				<input name='mdp_utilisateur2' id='mdp_utilisateur2' class='form-control' type='password' value='' size='30' maxlength='45' onblur="checkSamePswd()">
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
			</p>
		</form>
    </div>
<?php
	}
	else
	{
?>
		<div class='form-group'>
		<form method='POST' action='index.php?uc=connexion&action=inscription'>
				<label for='login_utilisateur'>Login</label>
				<input name='login_utilisateur' id='login_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLogin()" >
				
				<label for='nom_utilisateur'>Nom</label>
				<input name='nom_utilisateur' id='nom_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkLastName()">
				
				<label for='prenom_utilisateur'>Prenom</label>
				<input name='prenom_utilisateur' id='prenom_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkFirstName()">
				
				<label for='adresse_utilisateur'>Adresse</label>
				<input name='adresse_utilisateur' id='adresse_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkAdresse()">
				
				<label for='mail_utilisateur'>Mail</label>
				<input name='mail_utilisateur' id='mail_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkMail()" >
				
				<label for='tel_utilisateur'>Tel</label>
				<input name='tel_utilisateur' id='tel_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkTel()">
				
				<label for='code_postal_utilisateur'>Code postal</label>
				<input name='code_postal_utilisateur' id='code_postal_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkCodePostal()">
				
				<label for='ville_utilisateur'>Ville</label>
				<input name='ville_utilisateur' id='ville_utilisateur' type='text' class='form-control' size='30' maxlength='45' onblur="checkVille()">
				
				<label for='mdp_utilisateur'>MDP</label>
				<input name='mdp_utilisateur' id='mdp_utilisateur' class='form-control' type='password' value='' size='30' maxlength='45'>
				confirmer MDP
				<input name='mdp_utilisateur2' id='mdp_utilisateur2' class='form-control' type='password' value='' size='30' maxlength='45' >
			
				<input type='submit' value='Valider' onclick="return checkSubmit()" name='valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' onclick="resetColors()" name='annuler' class='btn btn-primary'>
			</p>
		</form>
    </div>
<?php
	}
?>