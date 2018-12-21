<?php
if ($_REQUEST['action'] == "modif")
{
	$id = $_SESSION['id'];
	$nom_util = $_POST['nom_util'];
	$prenom_util = $_POST['prenom_util'];
	$adresse_util = $_POST['adresse_util'];
	$mail_util = $_POST['mail_util'];
	$tel_util = $_POST['tel_util'];
	$cp_util = $_POST['cp_util'];
	$ville_util = $_POST['ville_util'];
	$login_util = $_POST['login_util'];
	$nouvmdp_util = $_POST['nouv_mdp'];
	$nouvmdp2_util = $_POST['nouv_mdp2'];
	
	if ($nouvmdp_util != "" && $nouvmdp_util == $nouvmdp2_util)
	{
		$change_param = set_param_compte($id, $nom_util, $prenom_util, $adresse_util, $mail_util, $tel_util, $cp_util, $ville_util, $login_util, $nouvmdp_util);
		if ($change_param == true)
		{
                    include("vues/v_modificationDeProduit.php");
                }else{
                    include("vues/v_pageErreure.php");
                }
        }else{
            
                $change_param = set_param_compte_nomdp($id, $nom_util, $prenom_util, $adresse_util, $mail_util, $tel_util, $cp_util, $ville_util, $login_util);
		if ($change_param == true)
		{
                    include("vues/v_modificationDeProduit.php");
                }else{
                    include("vues/v_pageErreure.php");
                }
        }
	


}

elseif ($_REQUEST['action'] == "voir")
{
	include("vues/v_infosUtilisateur.php");
}