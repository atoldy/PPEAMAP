<?php

$xml = '<?xml version="1.0"  encoding="UTF-8"?>'; // je ne suis pas sur de ma syntaxe sur cette ligne
$xml .= '<livraisons>';
// connexion SQL
$req = $bdd->prepare("select DISTINCT utilisateur.id,utilisateur.nom,utilisateur.adresse,utilisateur.codepostal,utilisateur.ville from utilisateur,livraison where utilisateur.id=livraison.id_utilisateur");

 
$resu=$req->execute();

while($ligne=$req->fetch()){
  
 $xml .= '<livraison>
 <nom>'.$ligne['nom'].'</nom>
 <adresse>'.$ligne['adresse'].'</adresse>
     <codepostal>'.$ligne['codepostal'].'</codepostal>
         <ville>'.$ligne['ville'].'</ville>';
        $request = $bdd->prepare("select colis.ref,colis.montanttotal from utilisateur,colis,livraison where utilisateur.id=livraison.id_utilisateur and colis.id_livraison=livraison.id and utilisateur.id=".$ligne['id']." ");   
        $resu=$request->execute();
        while($doneeColis=$request->fetch()){
            $xml .='<colis>
                <ref>'.$doneeColis['ref'].'</ref>
                 <montant>'.$doneeColis['montanttotal'].'</montant>
             </colis>';
        }
  
 $xml .='</livraison> ';
}
$xml .= '</livraisons>';

file_put_contents('xml/livraison.xml', $xml);
include('vues/v_exportXml.php');
?>
