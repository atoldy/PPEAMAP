<form method="POST" action="index.php?uc=ajout&action=ajouterArticle">
	<fieldset>
	<legend>Ajout</legend>
        <p>
		<label for="libelle">Libelle</label>
		<input id="libelle" type="text" name="libelle" value="" size="30" maxlength="45">
	</p>
	<p>
		<label for="description">Description</label>
		<input id="description" type="text" name="description" value="" size="30" maxlength="45">
	</p>
	<p>
		<label for="prix">Prix</label>
		<input id="prix" type="text" name="prix" value="" size="30" maxlength="45">
	</p>
        <p>
		<label for="quantite">Quantite</label>
		<input id="quantite" type="text" name="prix" value="" size="30" maxlength="45">
	</p>
	<p>
		<label for="idCategorie">Catégorie</label>
		<select class="reset" name="categorie" id="niveau">
			<option value="com">Type</option>
		    <option value="1">Feculant</option>
		    <option value="2">Fruit</option>
		</select>
	</p>
	<p>
		<input type="submit" value="Valider" name="valider">
	</p>
</form>