<body> 
		<div class="container-fluid banniere">
			<div class="row">
				
				<div class="titre" ><h1>AMAP</h1></div>
			</div>
		</div>
		
		<?php 
			if (!isset($_SESSION['id_Type_utilisateur']))   //pas connecté
			{
				echo "
					<nav class='navbar navbar-default'>
					  <div class='container'>
						<div class='navbar-header'>
						  <a class='navbar-brand' href='index.php'><img src='img/home.svg' id='imgHome' alt='Home button'></a>
						</div>
						<ul class='nav navbar-nav'>
						  <li><a href='index.php?uc=voirProduits'>Produits</a></li>
						  <li><a href='index.php?uc=gestionPanier&action=voir'>Panier</a></li>
						  <li><a href='index.php?uc=connexion&action=connexion'>Connexion</a></li>
						</ul>
					  </div>
					</nav>";
			}

			elseif ($_SESSION['id_Type_utilisateur'] == 1)   //connecté en admin
			{
				echo "
					<nav class='navbar navbar-default'>
                                          <p> connecté en tant qu'admin</p>
					  <div class='container'>
						<div class='navbar-header'>
						  <a class='navbar-brand' href='index.php'>AMAP</a>
						</div>
						<ul class='nav navbar-nav'>
						  <li><a href='index.php?uc=voirProduitsAdmin'>Catégories</a></li>
                                                   <li><a href='index.php?uc=exportXml'>Exporter le xml</a></li>
						  <li><a href='index.php?uc=voirUtilisateur'>Comptes utilisateur</a></li>
						  <li><a href='index.php?uc=infoCompte&action=voir'>informations compte</a></li>
						  <li><a href='index.php?uc=deco'>Déconnectez-vous</a></li>
						</ul>
					  </div>
					</nav>";
			}

			elseif ($_SESSION['id_Type_utilisateur'] == 2)   //connecté en producteur
			{
				echo "
					<nav class='navbar navbar-default'>
                                          <p> connecté en tant que producteur</p>
					  <div class='container'>
						<div class='navbar-header'>
						  <a class='navbar-brand' href='index.php'>AMAP </a>
                                                
						</div>
						<ul class='nav navbar-nav'>
						
						  <li><a href='index.php?uc=voirProduitsProducteur'>Mes produits</a></li>
						  <li><a href='index.php?uc=infoCompte&action=voir'>informations compte</a></li>
						  <li><a href='index.php?uc=deco'>Déconnectez-vous</a></li>
						</ul>
					  </div>
					</nav>";
			}

			elseif ($_SESSION['id_Type_utilisateur'] == 3)  //connecté en consommateur 
			{
				echo "
					<nav class='navbar navbar-default'>
                                          <p> connecté en tant que consomateur</p>
					  <div class='container'>
						<div class='navbar-header'>
						  <a class='navbar-brand' href='index.php'>AMAP</a>
						</div>
						<ul class='nav navbar-nav'>
						  <li><a href='index.php?uc=voirProduits'>Produits</a></li>
						  <li><a href='index.php?uc=infoCompte&action=voir'>informations compte</a></li>
						  <li><a href='index.php?uc=gestionPanier&action=voir'>Panier</a></li>
						  <li><a href='index.php?uc=deco'>Déconnectez-vous</a></li>
						</ul>
					  </div>
					</nav>";
			}
		
			elseif ($_SESSION['id_Type_utilisateur'] == 4)  //connecté en tant que secrétaire 
			{
				echo "
					<nav class='navbar navbar-default'>
                                          <p> connecté en tant que secrétaire</p>
					  <div class='container'>
						<div class='navbar-header'>
						  <a class='navbar-brand' href='index.php'>AMAP</a>
						</div>
						<ul class='nav navbar-nav'>
						  
                                                   <li><a href='index.php?uc=exportXml'>Exporter le xml</a></li>
						  <li><a href='index.php?uc=infoCompte&action=voir'>informations compte</a></li>
						  
						  <li><a href='index.php?uc=deco'>Déconnectez-vous</a></li>
						</ul>
					  </div>
					</nav>";
			}