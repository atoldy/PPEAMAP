<?php
	if (isset($_SESSION['id']))//si co
	{
		//si panier vide
		if (count($_SESSION['panier']['libelleProduit']) <= 0)
		{
			echo "panier vide";
		}
		else
		{
			$client = $_SESSION['nom']." ".$_SESSION['prenom'];
			$adresse = $_SESSION['adresse']." ".$_SESSION['codepostal']." ".$_SESSION['ville'];
		
			$testProduits = true;
			//pour chaque produit, verifier si sa qte est <= a celle en bdd
			for ($i=0 ;$i < count($_SESSION['panier']['libelleProduit']) && $testProduits==true; $i++)
			{
				$libelle = $_SESSION['panier']['libelleProduit'][$i];
				$qte = $_SESSION['panier']['qteProduit'][$i];
				
				$testProduits = verifQteProduit($libelle, $qte);
                                
			}
			
			if ($testProduits == true)//si tous les produits OK
			{
				$idLivraison = nouvLivraison($_SESSION['id']);//creer la nouvelle livraison et recupere son id

                                $idLivraison = $idLivraison['0']['max(id)'];
                               
				$nbArticles = compterArticles();
				for ($i=0 ;$i < $nbArticles ; $i++)//pour chaque article du panier
				{
					$montantTotal = $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
					$quantiteProd = $_SESSION['panier']['qteProduit'][$i];
					$idProduit = $_SESSION['panier']['idProduit'][$i];
					
					$retour=nouvColis($montantTotal, $idLivraison, $quantiteProd, $idProduit);
                                        //echo($retour);
                                           $req = $bdd->prepare("UPDATE produit SET quantite = quantite-".$quantiteProd." WHERE id = ".$idProduit."");
                              $req->execute();
				}
                                supprimePanier();
                                 
                           
				
			?>  
        
                            
                                <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Commande enregistrée</h4>
                                    <p>Merci votre commande a bien été prise en compte, cilquer sur le bouton retour pour revenir à l'accueil.</p>
                                    <hr>
                                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href = 'index.php';">Retour</button>
                                </div>
			
                       

                        <?php
			}
			else
			{
				?> 
                                    <div class="alert alert-danger" role="alert">
                                  <h4 class="alert-heading">Commande impossible</h4>
                                 <p>les produits ne sont plus disponible </p>
                                <hr>
                             <button type="button" class="btn btn-primary btn-lg" onclick="location.href = 'index.php?uc=gestionPanier&action=voir';">Retour</button>
                            </div>
	<?php			
			}
		}
		
	}
	else
	{
            ?>
        
	
	<div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Commande impossible</h4>
            <p>Vous devez être connecté en tant qu'utilisateur pour commander merci de cliquer sur le bouton si dessous pour vous connectez.</p>
            <hr>
            <button type="button" class="btn btn-primary btn-lg" onclick="location.href = 'index.php?uc=connexion&action=connexion';">Se connecter</button>
        </div>
		
        <?php
	}
        ?>