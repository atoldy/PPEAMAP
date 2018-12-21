<?php
	
	if (!isset($_REQUEST['idUtilisateur']) || !isset($_REQUEST['action']))
	{
		include('vues/v_accueil.php');
	}
	
	elseif($_REQUEST['action']=='Modifier')
	{
		$utilisateurs = get_unUtilisateur($_REQUEST['idUtilisateur']);
                $typeUtilisateurs = get_type_utilisateur();
                include ('vues/v_ModifierUtilisateur.php');
        }elseif($_REQUEST['action']=='Supprimer'){
            //Si action est supprimé lance requète qui supprime tous les colis et les livraisons corréspondants à l'utilisateur puis l'utilisateur
            $utilisateurs = get_unUtilisateur($_REQUEST['idUtilisateur']);
            foreach ($utilisateurs as $utilisateur){
                if($utilisateur['id_Type_utilisateur']==3 ||$utilisateur['id_Type_utilisateur']==4 ){
             try{
             $req = $bdd -> prepare("delete from colis where colis.id_livraison IN(SELECT id FROM livraison WHERE id_utilisateur=".$utilisateur['id'].");delete from livraison where id_utilisateur=".$utilisateur['id'].";delete from utilisateur where id= ".$utilisateur['id']."");
             $req->execute();
             }catch(Exception $e){include('vues/v_pageErreure.php');}
             
            }
                if($utilisateur['id_Type_utilisateur']==2){
                      try{
                    $req = $bdd -> prepare("delete from colis where id_produit in (select produit.id from produit where produit.id_utilisateur =".$utilisateur['id'].");delete from produit where produit.id_utilisateur =".$utilisateur['id'].";delete from utilisateur where id=  ".$utilisateur['id']."");
             $req->execute();
             }catch(Exception $e){include('vues/v_pageErreure.php');}
             
                }
            } 
            include('vues/v_SupprimerUtilisateur.php');
        }
	
	
?>
