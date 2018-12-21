<?php
session_start();
  
include_once('util/connexion_sql.php');
include_once('util/fonctions.php');
$categories = get_categ();

include_once('vues/v_entete.php');//entete pour toutes les pages
include_once('vues/v_bandeau.php');//donne un menu different si on est connecté

if(!isset($_REQUEST['uc']))
{
	$uc = 'accueil';
}   
else
{
	$uc = $_REQUEST['uc'];
}	
	
switch($uc)
{
	case 'accueil' :
		{include("vues/v_accueil.php");break;}
	case 'voirProduits' :
		{include("controleurs/c_voirProduits.php");break;}
	case 'gestionPanier' :
		{include("controleurs/c_gestionPanier.php");break;}
	case 'connexion' :
		{include("controleurs/c_connexion.php");break;}
	case 'infosCompte' :
		{include("controleurs/c_infosCompte.php");break;}
	case 'voirProduitsProducteur' :
		{include("controleurs/c_voirProduitsProducteur.php");break;}
        case 'voirProduitsAdmin' :
		{include("controleurs/c_voirProduitsAdmin.php");break;}
	case 'deco' :
		{include("controleurs/c_deconnection.php");break;}
	case 'infoCompte' :
		{include("controleurs/c_infosCompte.php");break;}
	/*case 'creationCompte' :
		{include("controleurs/c_creationCompte.php");break;}*/
	case 'passerCommande' :
		{include("controleurs/c_commande.php");break;}
        case 'voirUtilisateur' :
		{include("controleurs/c_voirUtilisateur.php");break;}
        case 'ModifierUtilisateur':
		{include("controleurs/c_ModifierUtilisateur.php");break;}
        case 'GererUtilisateur' :
		{include("controleurs/c_GererUtilisateur.php");break;}
	case 'ajout' :
		{include("controleurs/c_gestionProduits.php");break;}
                     case 'gestionPanierProducteur' :
 
            {include("controleurs/c_GestionPanierProducteur.php");break;}
 
            
 
        case 'modificationDeProduit' :
 
        {include("controleurs/c_modificationDeProduit.php");break;}
        
        case 'exportXml' :
 
        {include("controleurs/c_exportXml.php");break;}
           
 
        case 'AjoutDeProduit' :
 
           {include("controleurs/c_AjoutDeProduit.php");break;}
 
      
}

include("vues/v_pied.php") ;
?>
