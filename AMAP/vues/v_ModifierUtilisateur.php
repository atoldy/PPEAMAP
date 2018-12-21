<?php
foreach($utilisateurs as $utilisateur)
					{
	echo"
            
	<div class='container'>
		<div class='form-group col-lg-10 ' >
			<h1>Informations du compte</h1>
			<form method='post' action='index.php?uc=ModifierUtilisateur&action=modif&idUtilisateur=".$utilisateur['id']."'>
                            <label for='libeltype'>Type Utilisateur</label>
                                <select class='form-control' name='libeltype'>";
                                        $cpt=1;              
					foreach($typeUtilisateurs as $type)
					{
                                            if($cpt==$type['id']){
                                               echo "<<option name='libeltype' selected='selected' value=".$type['id'].">".$type['libelle']."</option>";
                                            }else{
						echo "<option name='libeltype' value=".$type['id'].">".$type['libelle']."</option>";
                                            }
					}
                  
                                         
                                echo "</select>
                                <input name='id_util' value ='".$utilisateur['id']."' id='id_util' type='hidden' class='form-control' size='30' maxlength='45' />
                                    
				<label for='nom_util'>Nom</label>
				<input name='nom_util' value ='".$utilisateur['nom']."' id='nom_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='prenom_util'>Prenom</label>
				<input name='prenom_util' value ='".$utilisateur['prenom']."' id='prenom_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='adresse_util'>Adresse</label>
				<input name='adresse_util' value ='".$utilisateur['adresse']."' id='adresse_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='mail_util'>Mail</label>
				<input name='mail_util' value ='".$utilisateur['mail']."' id='mail_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='tel_util'>Tel</label>
				<input name='tel_util' value ='".$utilisateur['tel']."' id='tel_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='cp_util'>CP</label>
				<input name='cp_util' value ='".$utilisateur['codepostal']."' id='cp_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='ville_util'>Ville</label>
				<input name='ville_util' value ='".$utilisateur['ville']."' id='ville_util' type='text' class='form-control' size='30' maxlength='45' />
				
				<label for='login_util'>Login</label>
				<input name='login_util' value ='".$utilisateur['login']."' id='login_util' type='text' class='form-control' size='30' maxlength='45' /></br>
				
				</br>
				<input type='submit' value='Valider' class='btn btn-primary'>
				<input type='reset' value='Annuler' class='btn btn-primary'>
			</form>
		</div>
	</div>";
                                        }
        