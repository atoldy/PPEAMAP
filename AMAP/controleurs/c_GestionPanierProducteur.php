<?php
if($_REQUEST['action'] == "Modifier")
{
        $categories = get_categ();
	
	if (!isset($_REQUEST['idProduit']))
	{
		$produits = get_produit(0);
	}
	
	else
	{
		$produits = get_unProduit($_REQUEST['idProduit']);
	}
	include('vues/v_gestionPanierProducteur.php');
}
elseif($_REQUEST['action'] == "Suprimer")
{
        if(isset($_REQUEST['idProduit']))
        {
                supprimerProduit($_REQUEST['idProduit']);
                include('vues/v_ValidationSupprimer.php');  
	}
	
}elseif($_REQUEST['action'] == "Ajouter")
{
        $categories = get_categ();
	
	if (!isset($_REQUEST['idProduit']))
	{
		$produits = get_produit(0);
	}
	
	else
	{
		$produits = get_unProduit($_REQUEST['idProduit']);
	}
	include('vues/v_gestionPanierProducteur.php');
}
elseif($_REQUEST['action'] == "Ajouter")
{
        include('vues/v_ajoutproduits.php');
	
}	
	
?>
