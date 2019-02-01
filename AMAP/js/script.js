$(document).ready(function()
{
	//clique sur le bouton accueil affiche la page d'accueil
    $('#accueil').on('click', function(){ 
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_accueil.php',
            type : 'GET',
            dataType : 'html',

            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });

	//pour afficher categorie au passage de la souris sur le bouton produit
	$('#produit').on('mouseover', function(){
		$('#menucateg').addClass('open');
				}).on('mouseleave', function(){
		setTimeout(function(){
			$('#menucateg').removeClass('open');

		},2500);
	});
	
	//si on clique sur une cat, cela affiche els produit de la cat
    $('li[id^="cat"]').on('click',function(){
        var box = $('#corps');
		
        $.ajax({
            url: 'modele/ajax_page_produit.php',
            type : 'GET',
            dataType : 'text',
			data : 'categ=' + this.id.charAt(3),
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
	
	//affiche tous les produit au click sur le bouton produit
	$('#produit').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_produit.php?categ=0',
            type : 'GET',
            dataType : 'text',
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
    
	//affiche page connexion producteur au click sur le bouton producteur
    $('#producteurs').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_producteurs.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
				
				//affiche page inscription producteur au click sur le "Pas de compte producteur? Cliquez ici!"
				$('#inscription_producteur').on('click',function(){
				var box = $('#corps');
				$.ajax({
					url: 'modele/ajax_inscription_producteurs.php',
					type : 'GET',
					dataType : 'html',
					success: function (data) {
						box.html(data);
					},
					error: function() {
						box.html("Désolé, aucun résultat trouvé.");
					}
					});
				});
	
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
    
	//affiche page connexion producteur au click sur le bouton consommateurs
    $('#consommateurs').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_consommateurs.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
				
				//affiche page inscription consommateurs au click sur le "Pas de compte consommateurs? Cliquez ici!"
				$('#inscription_consommateur').on('click',function(){
				var box = $('#corps');
				$.ajax({
					url: 'modele/ajax_inscription_consommateurs.php',
					type : 'GET',
					dataType : 'html',
					success: function (data) {
						box.html(data);
					},
					error: function() {
						box.html("Désolé, aucun résultat trouvé.");
					}
					});
				});
				
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
	
	//dans l'espace consommateur, affiche els information du compte au click sur le bouton informations compte
	$('#info_consommateur').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_info_util.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
	
	$('#info_producteur').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_info_util.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
});
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Modifier");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
//popup de demande de confirmation lors de suppresion d'utilisateur par admin
function verif()
{ check = confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?') 
    if(check==false){return false} };
function verifSupProduit()
{ check = confirm('Êtes-vous sûr de vouloir supprimer ce produit ?') 
    if(check==false){return false} };

function change_valeur() {
var select = document.getElementById("user");
var choice = select.selectedIndex  // Récupération de l'index du <option> choisi
 
var valeur_cherchee = select.options[choice].value;
return valeur_cherchee;
}

 var requete = null;


function affichertableau(id){
    if(id!=0){
    window.location.href = "index.php?uc=voirCommandes&user="+id;
} 
}

