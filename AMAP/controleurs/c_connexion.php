<div class='container'>
<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'formInscription' :
	{
		include_once('vues/v_inscription.php');
		break;
	}
	case 'inscription' :
	{
		$login = $_POST['login_utilisateur'];
		$nom = $_POST['nom_utilisateur'];
		$prenom = $_POST['prenom_utilisateur'];
		$adresse = $_POST['adresse_utilisateur'];
		$mail = $_POST['mail_utilisateur'];
		$tel = $_POST['tel_utilisateur'];
		$codepostal = $_POST['code_postal_utilisateur'];
		$ville = $_POST['ville_utilisateur'];
		$mdp = $_POST['mdp_utilisateur'];
		$mdp2 = $_POST['mdp_utilisateur2'];
                 //si le compte existe déja on renvoi sur le formulaire en idiquant que le compte existe déja
		if (verifierCompteExistant($login, $mail))
		{
			$_SESSION['alreadyExists'] = true;

			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
			$_SESSION['adresse']=$adresse;
			$_SESSION['ville']=$ville;
			$_SESSION['codePostal']=$codePostal;
			$_SESSION['tel']=$tel;
			header('Location: index.php?uc=connexion&action=formInscription');
		}
                //sinon on créer le compte
		else
		{          
                                $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);
				$creationCompte = set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $codepostal, $ville, $hashed_password,3);                        
                                include('vues/v_compteCree.php');
		}
		break;
	}
	case 'connexion' :
	{
		include_once('vues/v_connexion.php');
		break;
	}
}
?>
</div>
