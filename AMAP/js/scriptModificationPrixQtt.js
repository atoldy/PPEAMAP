var requete = null;
	function creerRequete()
	{
		try
		{
			requete = new XMLHttpRequest();
		} 
		catch (essaimicrosoft)
		{
			try
			{
				requete = new ActiveXObject("Msxm12.XMLHTTP");
			} 
			catch (autremicrosoft)
			{
				try
				{
					requete = new ActiveXObject("Microsoft.XMLHTTP");
				} 
				catch (echec)
				{
					requete = null;
				}
			}
		}
		if (requete == null)
		alert ("impossible de créer l'objet requête");
	}
	
function getProduit() 
{
     creerRequete();
     var categ = document.getElementById("categorie").value
     var url = "getProduit-ajax.php?categ="+categ;
     requete.open("GET", url, true);
     requete.onreadystatechange = actualiserPage;
     requete.send(null);
  }
  function actualiserPage()
 {	
       creerRequete();
       echo("tr");
		
	
}
function effacerRes() {
    div = document.getElementById("produit");
	div.removeChild(div.firstChild);
}