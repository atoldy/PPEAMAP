

<?php
$categories = get_categ();
	
	if (!isset($_REQUEST['categ']))
	{
		$produits = get_produit(0);
	}
	
	else
	{
		$produits = get_produit($_REQUEST['categ']);
	}
	include('vues/v_ajoutProduit.php');


 if ($_FILES['input-file-preview']['error'] > 0) $erreur = "Erreur lors du transfert";
//récupération des variables
        $nomImg=$_FILES['input-file-preview']['name'] ;



        
        $tailleImg= $_FILES['input-file-preview']['size'] ;

       $categories=$_POST['libelCat'];
	$libelle=$_POST['libelle'];
        $prix=$_POST['prix'];
        $qtt=$_POST['qtt'];
        $description=$_POST['description'];
        $id=$_SESSION['id'];
         $extension_upload =   substr(  strrchr($_FILES['input-file-preview']['name'], '.')  ,1)  ;

 //si l'utilisateur a envoyé  une image       
        if($nomImg!=''){
        
        
            //création d'une clé unique pour l'image (évite les noms double
        $nomImgModifie = md5(uniqid(rand(), true));
        //création du chemin de l'image
        $cheminImg = "img/produits/{$nomImgModifie}.{$extension_upload}";
        //ajout de l'image dans le dossier
        $resultat = move_uploaded_file($_FILES['input-file-preview']['tmp_name'],$cheminImg);
        
        global $bdd;
        $req = $bdd->prepare("INSERT INTO produit ( libelle, description, prixunitaire, quantite, id_utilisateur,id_categorie,nom_image) VALUES ("."'"."$libelle"."'".","."'"."$description"."'".", $prix, $qtt, $id,$categories,"."'"."$nomImgModifie"."'".");");
      
              
           
        
        $req->execute();
        }
        //sinon
         else{
               global $bdd;
        $req = $bdd->prepare("INSERT INTO produit ( libelle, description, prixunitaire, quantite, id_utilisateur) VALUES ("."'"."$libelle"."'".","."'"."$description"."'".", $prix, $qtt, $id);");
      
              
           
        
        $req->execute();
         }
      
?>
