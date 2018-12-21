<?php
$categories = get_categ();
$test=0;
	if (!isset($_REQUEST['categ']))
	{
		$produits = get_produit(0);
	}
	
	else
	{
		$produits = get_produit($_REQUEST['categ']);
	}
	
  if ($_FILES['input-file-preview']['error'] > 0) $erreur = "Erreur lors du transfert";
//récupération des variables
        $nomImg=$_FILES['input-file-preview']['name'] ;



        $categories=$_POST['libelCat'];
        $tailleImg= $_FILES['input-file-preview']['size'] ;
	$libelle=$_POST['libe'];
        $prix=$_POST['prix'];
        $qtt=$_POST['qtt'];
        $description=$_POST['description'];
        $id=$_POST['id'];
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
         //insertion des données dans la base
        $req = $bdd->prepare("UPDATE produit SET libelle='".$libelle."',
                                             prixunitaire=".$prix.",
                                             id_categorie=".$categories.",
                                             quantite=".$qtt.",
                                             nom_image='".$nomImgModifie."',
                                             description='".$description."'
                                             WHERE id=".$id."");
   

              $req->execute();
         
      
      
        
       
    }
        
          // sinon
   
    
          else{

                       global $bdd;
                       //insertion des données dans la base sans l'image
        $req = $bdd->prepare("UPDATE produit SET libelle='".$libelle."',
                                             prixunitaire=".$prix.",
                                             id_categorie=".$categories.",
                                             quantite=".$qtt.",
                                             description='".$description."'
                                             WHERE id=".$id."");
   
              

        
        $req->execute();
       

       
   
          }
     

           
        

	include('vues/v_modificationDeProduit.php');
     
?>
