<div class="container">
      
        
	<div class="row">
           
			<!--<div class="sidebar-nav col-sm-2 col-12">
				<div class="navbar navbar-default" role="navigation">
                    			<ul class="nav navbar-nav">
					
					<?php/*
					foreach($categories as $categorie)
					{
						echo "<li>
								<a href='index.php?uc=voirProduits&categ=".$categorie['id']."'>".$categorie['libelle']."</a>
							 </li>";
					}
                                         */
                                         ?>
                                         
					
					</ul>
				</div>
			  
				<?php /*
					echo "<div class='well well-sm'><p>".count($produits)." produit(s)</p></div>";                   
                                 */
				?>
			</div>-->
			
		  <div class="col-sm-10 col-xs-12">
			<?php
                        //si le producteur clique sur ajouter on affiche le formulaire d'ajout
                                if($_REQUEST['action']=="Ajouter"){
                                    if (!isset($_SESSION['id_Type_producteur'])) {

					
				
				echo "
                                    <form method='post' action='index.php?uc=AjoutDeProduit'  onsubmit='return checkSubmitModificationPrix()' enctype='multipart/form-data'>
                                    <div class='col-12 col-sm-10 well'>
                                    
                                            <div class='row'>
						<div class='col-12 col-sm-6 well well-sm'>
                                                    Catégorie Produit: 
                                                    <select class='form-control' name='libelCat'>";
                                                    
					foreach($categories as $categorie)
					{
						echo "<option name='libelCat' value=".$categorie['id'].">".$categorie['libelle']."</option>";
					}
                  
                                         
                                            echo "</select>
                                             </div>                   
                                            </div>
					  	
                                            <div class='row'>
						<div class='well well-sm' id='libelle_produit'>
                                                    Libellé produit: <input type='text' class='form-control' value='' name='libelle' id='libe'  onblur='checkLibe()' placeholder=></input>
                                                                
                                            </div>
                                            
                                            </div>
							
                                            <div class='row'>
                                                  
							<div class='col-12'>
								<div class='col-12 col-sm-6 col-md-4 well well-sm'>
									<img class='imageproduit img-rounded' src='' alt='' />
								</div>
								
								<div class='col-12 col-sm-6 col-md-8 well well-sm' id='description'>Description:<br/><textarea class='form-control' rows='5' name='description' onblur='checkDesc()'  id='Desc'></textarea>  
                                                               
                                                                </div>
                                                                
								
                                                        </div>
					    </div>
				
                                            <div class='row'>
                                                    <div class='col-12 col-sm-6 well well-sm'>
                                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                    <div class='input-group image-preview'>
                                                                        <input type='text' class='form-control image-preview-filename' disabled='disabled'> <!-- don't give a name === doesn't send on POST/GET -->
                                                                        <span class='input-group-btn'>
                                                                            <!-- image-preview-clear button -->
                                                                            <button type='button' class='btn btn-default image-preview-clear' style='display:none;'>
                                                                                <span class='glyphicon glyphicon-remove'></span> Effacer
                                                                            </button>
                                                                            <!-- image-preview-input -->
                                                                            <div class='btn btn-default image-preview-input'>
                                                                                <span class='glyphicon glyphicon-folder-open'></span>
                                                                                <span class='image-preview-input-title'>Choisir</span>
                                                                                <input type='file' accept='image/png, image/jpeg, image/gif' name='input-file-preview'/> <!-- rename it -->
                                                                            </div>
                                                                        </span>
                                                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                                          
                                                         
                                                        </div>
                                               
							
						
                                                    <div class='col-12 col-sm-6 well'>
                                                            <div class='col-sm-6' id='pu_produit'>Prix au kilo:  <input type='text' class='form-control'  value='' name='prix' id='prix' onblur='checkPrix()' placeholder=></input> euros.
                                                            
                                                            </div>
								
                                                            <div class='col-sm-6' id='quantite_produit'>Stock : <input type='text' class='form-control' value=''  name='qtt' id='qtt' onblur='checkQtt()'  placeholder=></input>  kilogramme(s)
                                                            
                                                            </div>
                          
                                                    </div>
                                            </div>
                                           <div class='row'>
                                               <div class='col-12 col-sm-12 submit '>
                                                      <a href='index.php?uc=voirProduitsProducteur' class='btn btn-info' role='button'>Retour</a>
                                                    <button type='submit' class='btn btn-default'>Enregistrer</button>
                                                    
                                               </div>
                                           </div>
                                          
                                    </div>
                                       </form>  ";
					
				}
                                }
                          //sinon on affiche le formulaire de modification
                                else{
				if (!isset($_SESSION['id_Type_producteur'])) {
				foreach($produits as $cle => $produit)
				{
   
                                        $req = $bdd->prepare("select id_categorie from produit where id= ".$produit['id']."");
                                      $resu=$req->execute();
                                      $ligne=$req->fetch();
                                      
   
                                  
                                          
                                     
				echo "
                                    <form method='post' action='index.php?uc=modificationDeProduit' onsubmit='return checkSubmitModificationPrix()' enctype='multipart/form-data'>
                                    <div class='col-12 col-sm-10 well'>
                                    
                                            <div class='row'>
						<div class='col-12 col-sm-6 well well-sm'>
                                                    Catégorie Produit: 
                                                    <select class='form-control' name='libelCat'>";
                                                    
					
                                            
                                        $cpt=1;          
					foreach($categories as $categorie)
					{
                                           if($cpt==$ligne['id_categorie']){
                                               echo "<option name='libelCat' selected='selected' value=".$categorie['id'].">".$categorie['libelle']."</option>";
                                           }else{
                                             
						echo "<option name='libelCat' value=".$categorie['id'].">".$categorie['libelle']."</option>";
                                           }
                                           $cpt++;
                                             
					}
                  
                                         
                                            echo "</select>
                                             </div>                   
                                            </div>
					  	
                                            <div class='row'>
						<div class='well well-sm' id='libelle_produit".$produit['id']."'>
                                                    Libellé produit: <input class='form-control' type='text'  value='".$produit['libelle']."' name='libe'  id='libe' onblur='checkLibe()' placeholder=".$produit['libelle']." ></input>
                                                                      
                                            </div>
                                            
                                           
                                            </div>
						   <input type='hidden' name='id' value=".$produit['id'].">	
                                            <div class='row'>
                                                  
							<div class='col-12'>
								<div class='col-12 col-sm-6 col-md-4 well well-sm'>
									<img class='imageproduit img-rounded'  src= 'img/produits/".mb_strtolower($produit['nom_image'])."' alt='' />
								</div>
								
								<div class='col-12 col-sm-6 col-md-8 well well-sm' id='description".$produit['id']."'>Description:<br/><textarea class='form-control' onblur='checkDesc()' rows='5' name='description'  id='Desc'>".$produit['description']."</textarea>  
                                                               
                                                                </div>
                                                                
								
                                                        </div>
					    </div>
				<!-- upload img -->
                                            <div class='row'>
                                                    <div class='col-12 col-sm-6 well well-sm'>
                                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                    <div class='input-group image-preview'>
                                                                        <input type='text' class='form-control image-preview-filename' disabled='disabled'> <!-- don't give a name === doesn't send on POST/GET -->
                                                                        <span class='input-group-btn'>
                                                                            <!-- image-preview-clear button -->
                                                                            <button type='button' class='btn btn-default image-preview-clear' style='display:none;'>
                                                                                <span class='glyphicon glyphicon-remove'></span> Effacer
                                                                            </button>
                                                                            <!-- image-preview-input -->
                                                                            <div class='btn btn-default image-preview-input'>
                                                                                <span class='glyphicon glyphicon-folder-open'></span>
                                                                                <span class='image-preview-input-title'>Choisir</span>


                                                                                <input type='file' value='img/produits/".mb_strtolower($produit['nom_image'])."' accept='image/png, image/jpeg, image/gif' name='input-file-preview'/> <!-- rename it -->
                                                                            </div>
                                                                        </span>
                                                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                                          
                                                         
                                                        </div>
                                               
							
						
                                                    <div class='col-12 col-sm-6 well'>
                                         <div class='col-sm-6' id='pu_produit".$produit['id']."'>Prix au kilo:  <input type='text' class='form-control'  value='".$produit['prixunitaire']."' name='prix' id='prix' onblur='checkPrix()' placeholder=".$produit['prixunitaire']." ></input> euros.
                                                            
                                                            </div>
								
                                                            <div class='col-sm-6' id='quantite_produit".$produit['id']."'>Stock : <input type='text'  class='form-control' value='".$produit['quantite']."'  name='qtt' id='qtt' onblur='checkQtt()'  placeholder=".$produit['quantite']."></input>  kilogramme(s)

                                                        
                                                    </div>
                                            </div>
                                           <div class='row'>
                                               <div class='col-12 col-sm-12 submit '>
                                                      <a href='index.php?uc=voirProduitsProducteur' class='btn btn-info' role='button'>Retour</a>
                                                    <button type='submit' class='btn btn-default'>Enregistrer</button>
                                                    
                                               </div>
                                           </div>
                                          
                                    </div>
                                       </form>  ";
					
				}
                                }
                                }
                                //test
			?>
		
		  </div>
                        
	</div>

</div> 

