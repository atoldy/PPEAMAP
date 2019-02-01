<?php
include_once("connexion_sql.php");
function get_categ() //Donne les categorie de produit a afficher dans le nav
{
    global $bdd;
    $req = $bdd->prepare('SELECT id, libelle FROM categorie ORDER BY libelle');
    $req->execute();
    $categories = $req->fetchAll();
    return $categories;
}
function get_commande($unUtil)//donne toute les commandes pour un utilisateur 
{
    global $bdd;
    $req = $bdd->prepare('SELECT id, date FROM livraison where id_utilisateur='.$unUtil);
    $req->execute();
    $commande = $req->fetchAll();
    return $commande;
}
function get_produit($uneCateg) //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
	$uneCateg = (int) $uneCateg;
	if($uneCateg==0)
	{$req = 'SELECT * FROM produit ORDER BY libelle';}
	else
	{$req = "SELECT * FROM produit WHERE produit.id_categorie = '".$uneCateg."' ORDER BY libelle";}
	$req = $bdd->prepare($req);
    $req->execute();
    $produits = $req->fetchAll();
    return $produits;
}
function get_utilisateur() //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
	$req = 'SELECT U.id,U.nom,U.prenom,libelle FROM utilisateur U,type_utilisateur T WHERE U.id_type_utilisateur=T.id ORDER BY id_Type_utilisateur';
	$req = $bdd->prepare($req);
    $req->execute();
    $utilisateurs = $req->fetchAll();
    return $utilisateurs;
}
function get_unProduit($unIdProduit) //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
	$unIdProduit = (int) $unIdProduit;
	{$req = "SELECT * FROM produit WHERE produit.id = '".$unIdProduit."' ";}
	$req = $bdd->prepare($req);
    $req->execute();
    $produits = $req->fetchAll();
    return $produits;
}
function get_type_utilisateur(){
    global $bdd;
	$req = 'SELECT id,libelle FROM type_utilisateur';
	$req = $bdd->prepare($req);
    $req->execute();
    $tutilisateur = $req->fetchAll();
    return $tutilisateur;
}
function get_unUtilisateur($unIdUtilisateur) //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
	$unIdUtilisateur = (int) $unIdUtilisateur;
	{$req = "SELECT * FROM Utilisateur WHERE id = '".$unIdUtilisateur."' ";}
	$req = $bdd->prepare($req);
    $req->execute();
    $Utilisateur = $req->fetchAll();
    return $Utilisateur;
}
function verifQteProduit($libelle, $qte)
{
	global $bdd;
	$req = "SELECT * FROM produit WHERE libelle = '".$libelle."'";
	$req = $bdd->prepare($req);
	$req -> execute();
	$produit = $req->fetch();
	if ($qte > $produit['quantite'])
	{
		return false;
	}
	else
	{
		return true;
	}
}
function get_produitProducteur($unId) //donne tous les produit ou seulement ceux d'une categ
{
    global $bdd;
  	$unId = (int) $unId;
  	$req = "SELECT * FROM produit WHERE produit.id_utilisateur = '".$unId."' ORDER BY libelle";
  	$req = $bdd->prepare($req);
    $req->execute();
    $produits = $req->fetchAll();
    return $produits;
}
function set_param_utilisateur($id, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $login,$type)
{
  	global $bdd;
  	$req = $bdd->prepare('UPDATE utilisateur
						SET nom= :nom,
						prenom= :prenom,
						adresse= :adresse,
						mail= :mail,
						tel= :tel,
						codepostal= :codepostal,
						ville= :ville,
						login= :login,
                                                id_Type_utilisateur= :type
						WHERE id= :id');
    $req->execute(array(
    	'nom' => $nom,
    	'prenom' => $prenom,
    	'adresse' => $adresse,
    	'mail' => $mail,
    	'tel' => $tel,
    	'codepostal' => $cp,
    	'ville' => $ville,
    	'login' => $login,
        'type' => $type,
    	'id' => $id
    ));
	return true;
}
function set_param_compte($id, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $login, $newMdp)
{
  	global $bdd;
  	$req = $bdd->prepare('UPDATE utilisateur
						SET nom= :nom,
						prenom= :prenom,
						adresse= :adresse,
						mail= :mail,
						tel= :tel,
						codepostal= :codepostal,
						ville= :ville,
						mdp= :mdp,
						login= :login
						WHERE id= :id');
    $req->execute(array(
    	'nom' => $nom,
    	'prenom' => $prenom,
    	'adresse' => $adresse,
    	'mail' => $mail,
    	'tel' => $tel,
    	'codepostal' => $cp,
    	'ville' => $ville,
    	'mdp' => $newMdp,
    	'login' => $login,
    	'id' => $id
    ));
	$_SESSION['id'] = $id;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	$_SESSION['adresse'] = $adresse;
	$_SESSION['mail'] = $mail;
	$_SESSION['tel'] = $tel;
	$_SESSION['codepostal'] = $cp;
	$_SESSION['ville'] = $ville;
	$_SESSION['mdp'] = $newMdp;
	$_SESSION['login'] = $login;
	return true;
}
function set_param_compte_nomdp($id, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $login)
{
  	global $bdd;
  	$req = $bdd->prepare('UPDATE utilisateur
						SET nom= :nom,
						prenom= :prenom,
						adresse= :adresse,
						mail= :mail,
						tel= :tel,
						codepostal= :codepostal,
						ville= :ville,
						login= :login
						WHERE id= :id');
    $req->execute(array(
    	'nom' => $nom,
    	'prenom' => $prenom,
    	'adresse' => $adresse,
    	'mail' => $mail,
    	'tel' => $tel,
    	'codepostal' => $cp,
    	'ville' => $ville,
    	'login' => $login,
    	'id' => $id
    ));
	$_SESSION['id'] = $id;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	$_SESSION['adresse'] = $adresse;
	$_SESSION['mail'] = $mail;
	$_SESSION['tel'] = $tel;
	$_SESSION['codepostal'] = $cp;
	$_SESSION['ville'] = $ville;
	$_SESSION['login'] = $login;
	return true;
}
function set_connexion($unLogin, $unMdp)//fait la connexion en consommateur, producteur ou admib
{
    global $bdd;
  $req = $bdd->prepare('SELECT mdp FROM utilisateur WHERE login= :login');
  while ($donnees = $req->fetch())
{
    $hashed_password = $donnees;
}
  
        if(password_verify($unMdp, $hashed_password)) {
    // If the password inputs matched the hashed password in the database
    // Do something, you know... log them in.
} 
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE login= :login AND mdp = :mdp');
	$req->execute(array(
	'login' => $unLogin,
	'mdp' => $unMdp
	));
    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);
	$MonMembreExiste = $req->rowCount();
	if ($MonMembreExiste == 0)
	{
		//si pas de compte
		return false;
	}
    else
	{
		//si ok
		$_SESSION['id'] = $utilisateur['id'];
		$_SESSION['nom'] = $utilisateur['nom'];
		$_SESSION['prenom'] = $utilisateur['prenom'];
		$_SESSION['adresse'] = $utilisateur['adresse'];
		$_SESSION['mail'] = $utilisateur['mail'];
		$_SESSION['tel'] = $utilisateur['tel'];
		$_SESSION['codepostal'] = $utilisateur['codepostal'];
		$_SESSION['ville'] = $utilisateur['ville'];
		$_SESSION['mdp'] = $utilisateur['mdp'];
		$_SESSION['login'] = $utilisateur['login'];
		$_SESSION['id_Type_utilisateur'] = $utilisateur['id_Type_utilisateur'];
		return true;
	}
}
function verifierCompteExistant($login, $mail)
	{
		global $bdd;
		$req = $bdd->prepare("SELECT login, mail FROM utilisateur WHERE login=:login OR mail=:mail");
		$req->execute(array(
			'login' => $login,
			'mail' => $mail
			));
		$existant=false;
		if ( $req->fetch() )
		{
			$existant = true;
		}
		return $existant;
	}
function set_compte($login, $nom, $prenom, $adresse, $mail, $tel, $cp, $ville, $mdp, $type)//creer un compte
{
    global $bdd;
    $req = ("INSERT INTO utilisateur(login,nom, prenom, adresse, mail, tel, codepostal, ville, mdp, id_Type_utilisateur)
							   Values('$login', '$nom', '$prenom', '$adresse', '$mail', $tel, $cp, '$ville', '$mdp', 3)");
 
							
    $req = $bdd->prepare($req);
    $req-> execute();
  
}
		
//modifier un article
function modifierArticleBD($idProduit, $description, $prix, $idCategorie)
{
    global $bdd;
    $req = $bdd->prepare("UPDATE produit SET id_categorie= :categorie,
                                             prixunitaire= :prix,
                                             quantite= :qtt,
                                             description= :description,
                                             WHERE id= :id');");
 $req->execute(array(
    	
    	'prix' => $prix,
    	'categorie' =>$idCategorie,
    	'description' => $description,
    	'id' => $idProduit
    ));
	return true;
}
function creerArticleBD($description, $prix, $idCategorie)
{
        global $bdd;
	$req = $bdd->prepare("INSERT INTO produit(description, prix, idCategorie)
	VALUES(:description, :prix, :idCategorie)");
	$req->execute(array(
		'description' => $description,
		'prix' => $prix,
		'idCategorie' => $idCategorie
		));
}
function creationPanier()
{
   if (!isset($_SESSION['panier']))
   {
      $_SESSION['panier']=array();
      $_SESSION['panier']['idProduit'] = array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['descriptionProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
   }
   return true;
}
function ajouterArticle($idProduit,$libelleProduit,$descriptionProduit,$qteProduit,$prixProduit){
   //Si le panier existe
   if (creationPanier())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
		 array_push( $_SESSION['panier']['idProduit'],$idProduit);
		 array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['descriptionProduit'],$descriptionProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function supprimerArticle($libelleProduit){
   //Si le panier existe
   if (creationPanier())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
	  $tmp['idProduit'] = array();
      $tmp['libelleProduit'] = array();
	  $tmp['descriptionProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
			array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
			array_push( $tmp['descriptionProduit'],$_SESSION['panier']['descriptionProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function supprimerProduit($idProduit){
    global $bdd;
    $req = "DELETE FROM `produit` WHERE `produit`.`id` = '".$idProduit."'";
	$req = $bdd->prepare($req);
	$req -> execute();
    
}
function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function MontantGlobal()
{
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;
}
function supprimePanier()
{
   unset($_SESSION['panier']);
}
function nouvLivraison($unIdUtil)
{
	global $bdd;
        $date=$bdd->query("Select NOW()");
        while ($donnees = $date->fetch()){
        $dateNow=$donnees["NOW()"];
        
	$req = $bdd->exec("INSERT INTO livraison (id_utilisateur,date) VALUES (".$unIdUtil.",'$dateNow')");
        }
        $req = $bdd->prepare('SELECT max(id) FROM livraison');
        $req->execute();
        $idLivraison = $req->fetchAll();
	//var_dump($req);
	//var_dump($bdd->lastInsertId());
	return $idLivraison;
}
function nouvColis($montantTotal, $idLivraison, $quantiteProd, $idProduit)
{
	global $bdd;
	$req = $bdd->exec("INSERT INTO colis (montanttotal,id_livraison,quantite,id_produit) VALUES ('$montantTotal', '$idLivraison', '$quantiteProd', '$idProduit')");
        //var_dump($req);
	/*$req->execute(array(
		'montant' => $montantTotal,
		'idLiv' => $idLivraison,
		'qte' => $quantiteProd,
		'idProd' => $idProduit
		)
	);*/
	return "INSERT INTO colis (montanttotal,id_livraison,quantite,id_produit) VALUES ('$montantTotal', '$idLivraison', '$quantiteProd', '$idProduit')";
}
