  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="../bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
  
  

  <?php if ($_SESSION['id_Type_utilisateur'] == 3){ ?>
 <div class="verde"> 
  <div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table class="class12">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">n°de commande</th>
                            <th class="column2">date </th>   
                        </tr> 
                    </thead>
                    <tbody>
                        <?php                  
                        $req = $bdd->prepare('SELECT id, date FROM livraison where id_utilisateur=' . $_SESSION['id']);
                        $req->execute();
                        while ($donnees = $req->fetch()) {
                            ?><tr>
                                <td class="column1"> <button class="btn btn-sucess btnC" data-target="#viewcontenir-<?= $donnees["id"] ?>" data-toggle="modal" ><?= $donnees["id"] ?></button></td>
                                <td class="column2"> <?= date("d/M/Y", strtotime($donnees["date"])); ?> </td>
                                <div class="modal fade" id="viewcontenir-<?= $donnees["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Détail de la commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         
        </button>
      </div>
      <div class="modal-body">
        <?php
        $reponseC = $bdd->query("SELECT * FROM colis WHERE id_livraison=" . $donnees["id"] . "");
        $donneesCn = $reponseC->fetchAll();
        foreach ($donneesCn as $donneesC) {                                                   
        $reponseC = $bdd->query("SELECT * FROM produit WHERE id ='" . $donneesC['id_Produit'] . "'");
        $ligne = $reponseC->fetch();
         
          ?>
          
          <div class="row">

        <div class="col-xs-4 col-md-12">
            <img class="img-responsive" src="img/produits/<?= $ligne["nom_image"] ?>" alt="prewiew" width="100px">
            <h4>Libellé : <?= $ligne["libelle"] ?></h4>
            <h4>Prix unitaire : <?= $ligne["prixunitaire"] ?></h4>
            <h4>Quantité : <?= $donneesC["quantite"] ?></h4>

        </div>
      </div>
        <?php } ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button
      </div>
    </div>
  </div>
</div>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  <?php }
  elseif ($_SESSION['id_Type_utilisateur'] == 1 || $_SESSION['id_Type_utilisateur'] == 4){ 
      $reponse = $bdd->query("SELECT * FROM utilisateur Where id_Type_utilisateur = 3"); ?>
      <div id="selectuser">
 <?php     
      if (!isset($_REQUEST['user']) || ($_REQUEST['user']==0)){?>
      
      <select id="user" name="user" onChange="affichertableau(this.value)">
          <option name="default" value="0">Choisissez un Client</option>
     <?php while ($lignes = $reponse->fetch()) {
         echo '<option name="'.$lignes['id'].'" value="'.$lignes['id'].'">'.$lignes['nom'].' '.$lignes['prenom'].'</option>';
     }
      }else{
          ?>
          
               <select id="user" name="user" onChange="affichertableau(this.value)">
                   <option name="default" value="0">Choisissez un Client</option>
     <?php while ($lignes = $reponse->fetch()) {
         if($_REQUEST['user']==$lignes['id']){
          echo '<option selected name="'.$lignes['id'].'" value="'.$lignes['id'].'">'.$lignes['nom'].' '.$lignes['prenom'].'</option>';
         }else{
         echo '<option name="'.$lignes['id'].'" value="'.$lignes['id'].'">'.$lignes['nom'].' '.$lignes['prenom'].'</option>';
         }
         
         } 
      
?>
          
      </select>
          </div>
         
    <div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table class="class12">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">n°de commande</th>
                            <th class="column2">date </th>   
                        </tr> 
                    </thead>
                    <tbody>
                        <?php 
                     if(isset($_REQUEST['user'])){   
                        $user=$_REQUEST['user'];
                     }else{
                         $user=0;
                     }
                        $req = $bdd->prepare('SELECT id, date FROM livraison where id_utilisateur='.$user);
                        $req->execute();
                        while ($donnees = $req->fetch()) {
                            ?><tr>
                                <td class="column1"> <button class="btn btn-sucess btnC" data-target="#viewcontenir-<?= $donnees["id"] ?>" data-toggle="modal" ><?= $donnees["id"] ?></button></td>
                                <td class="column2"> <?= date("d/M/Y", strtotime($donnees["date"])); ?> </td>
                                <div class="modal fade" id="viewcontenir-<?= $donnees["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Détail de la commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         
        </button>
      </div>
      <div class="modal-body">
        <?php
        $reponseC = $bdd->query("SELECT * FROM colis WHERE id_livraison=" . $donnees["id"] . "");
        $donneesCn = $reponseC->fetchAll();
        foreach ($donneesCn as $donneesC) {                                                   
        $reponseC = $bdd->query("SELECT * FROM produit WHERE id ='" . $donneesC['id_Produit'] . "'");
        $ligne = $reponseC->fetch();
         
          ?>
          
          <div class="row">

        <div class="col-xs-4 col-md-12">
            <img class="img-responsive" src="img/produits/<?= $ligne["nom_image"] ?>" alt="prewiew" width="100px">
            <h4>Libellé : <?= $ligne["libelle"] ?></h4>
            <h4>Prix unitaire : <?= $ligne["prixunitaire"] ?></h4>
            <h4>Quantité : <?= $donneesC["quantite"] ?></h4>

        </div>
      </div>
        <?php } ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button
      </div>
    </div>
  </div>
</div>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 
      <?php } } ?>  
 </div>
</div>