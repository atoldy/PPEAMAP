﻿var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;
var numbers = /^[0-9]*[.][0-9]+$|^[0-9]+$/;
var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var float = /^[0-9]*[.][0-9]+$/;
function checkLastName()
{
	var error = false;
	var lastName = document.querySelector('[id^="nom_"]');
	if ( lastName.value.length == 1 )
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( lastName.value != "" && !lastName.value.match(letters) )
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}
	else if ( lastName.value == "" || error == false )
	{
		document.querySelector('[id^="nom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="nom_"]').style.boxShadow = "initial";
	}
};

function checkFirstName()
{
	var error = false;
	var firstName = document.querySelector('[id^="prenom_"]');
	if ( firstName.value.length == 1 )
	{
		error = true;
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
	}
	else if ( !firstName.value == "" && !firstName.value.match(letters) )
	{
		error = true;
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
	}
	else if ( firstName.value == "" || error == false )
	{
		document.querySelector('[id^="prenom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "initial";
	}
};

function checkLogin()
{
	document.querySelector('[id^="login_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="login_"]').style.boxShadow = "none";
};

function checkPswd()
{
	var error = false;
	var pswd = document.querySelector('[id^="mdp_"]');
	if ( pswd.value == "" || pswd.value.length < 6 )
	{
		error = true;
		document.querySelector('[id^="mdp_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mdp_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 6 caractères");
	}
	else if ( pswd.value != "" || error == false )
	{
		document.querySelector('[id^="mdp_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="mdp_"]').style.boxShadow = "initial";
	}
};

function checkSamePswd()
{
    var pswd1 = document.querySelector('[id^="mdp_"]');
    var pswd2 = document.querySelector('[id^="mdp_"][id$="2"]');
    if(pswd2 != ""){
    
    if( pswd1.value != "" && pswd1.value != pswd2.value )
    {
    	document.querySelector('[id^="mdp_"][id$="2"]').style.borderColor = "rgba(255, 0, 0, 1)";
			document.querySelector('[id^="mdp_"][id$="2"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
      alert("Veuillez rentrer le même mot de passe que celui rentré précédemment");
    }
    else
    {
    	document.querySelector('[id^="mdp_"][id$="2"]').style.border = "1px solid #CCC";
			document.querySelector('[id^="mdp_"][id$="2"]').style.boxShadow = "initial";
    }
    }
};

function checkMail()
{
	if( !document.querySelector('[id^="mail_"]').value.match(regexEmail) )
	{
		document.querySelector('[id^="mail_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mail_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer un e-mail correct");
	}
	else
	{
		document.querySelector('[id^="mail_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="mail_"]').style.boxShadow = "none";
	}
};

function checkAdresse()
{
	document.querySelector('[id^="adresse_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="adresse_"]').style.boxShadow = "initial";
};

function checkVille()
{
	document.querySelector('[id^="ville_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="ville_"]').style.boxShadow = "initial";
};

function checkCodePostal()
{
	var error = false;
	var cp = document.querySelector('[id^="code_postal_"]');
	if ( cp.value.length != 5 )
	{
		error = true;
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre code postal doit comprendre 5 caractères");
	}
	else if ( cp.value != "" && !cp.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre code postal doit ne doit comprendre que des chiffres");
	}
	else if ( cp.value == "" || error == false )
	{
		document.querySelector('[id^="code_postal_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "initial";
	}
};

function checkPhone()
{
	document.querySelector('[id^="tel_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="tel_"]').style.boxShadow = "initial";
};

function checkSubmit()
{
	var error = false;

	if ( document.querySelector('[id^="nom_"]').value == "" || document.querySelector('[id^="nom_"]').value.length < 2 || !document.querySelector('[id^="nom_"]').value.match(letters) )
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="prenom_"]').value == "" || document.querySelector('[id^="prenom_"]').value.length < 2 || !document.querySelector('[id^="prenom_"]').value.match(letters) )
	{
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="login_"]').value == "" )
	{
		document.querySelector('[id^="login_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="login_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="mdp_"]').value.length < 6 )
	{
		document.querySelector('[id^="mdp_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mdp_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	var pswd1 = document.querySelector('[id^="mdp_"]');
    var pswd2 = document.querySelector('[id^="mdp_"][id$="2"]');
	if ( pswd1.value != pswd2.value || pswd2.value == "" )
	{
		document.querySelector('[id^="mdp_"][id$="2"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mdp_"][id$="2"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( !document.querySelector('[id^="mail_"]').value.match(regexEmail) )
	{
		document.querySelector('[id^="mail_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mail_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="adresse_"]').value == "" )
	{
		document.querySelector('[id^="adresse_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="adresse_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="ville_"]').value == "" )
	{
		document.querySelector('[id^="ville_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="ville_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="code_postal_"]').value == "" )
	{
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="tel_"]').value == "" )
	{
		document.querySelector('[id^="tel_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="tel_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( error == true )
	{
		alert("Champ(s) non rempli(s) ou incorrect(s)");
		return false;
	}
	else
	{
		return true;
	}
};

function resetColors()
{
	for ( var i = 0 ; i < document.getElementsByClassName("reset").length ; i++ )
	{
		document.getElementsByClassName("reset")[i].style.borderColor = "initial";
		document.getElementsByClassName("reset")[i].style.boxShadow = "initial";
	}
}
// Check formulaire Ajout et modification prix
//controle  le champ prix
function checkPrix()
{
   var error = false;
	var prix = document.querySelector('[id^="prix"]');
	 if( prix.value != "" && !prix.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="prix"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prix"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre prix doit ne doit comprendre que des chiffres");
	}
        if( prix.value == ""){
		error = true;
		document.querySelector('[id^="prix"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prix"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez indiquer un prix");
	}
	else if ( prix.value === "" || error == false )
	{
		document.querySelector('[id^="prix"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="prix"]').style.boxShadow = "initial";
	}
    
};
//controle le champ quantité 
function checkQtt()
{
   var error = false;
	var qtt = document.querySelector('[id^="qtt"]');
	 if( qtt.value != "" && !qtt.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="qtt"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="qtt"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre quantité doit ne doit comprendre que des chiffres");
	} if( qtt.value == ""){
		error = true;
		document.querySelector('[id^="qtt"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="qtt"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez indiquer une quantité");
	}
	else if ( prix.value != "" || error == false )
	{
		document.querySelector('[id^="qtt"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="qtt"]').style.boxShadow = "initial";
	}
    
};
//controle le champ description
function checkDesc()
{
   var error = false;
	var Desc = document.querySelector('[id^="Desc"]');
           
	 if( Desc.value == ""){
		error = true;
		document.querySelector('[id^="Desc"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="Desc"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez écrire une description");
	}
	else if ( Desc.value != "" || error == false )
	{
		document.querySelector('[id^="Desc"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="Desc"]').style.boxShadow = "initial";
	}
    
};
//contrôle le champ libélé
function checkLibe()
{
   var error = false;
	var libe = document.querySelector('[id^="libe"]');
        
	 if( libe.value == ""){
          
		error = true;
		document.querySelector('[id^="libe"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="libe"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez écrire une description");
	}
	else if ( libe.value != "" || error == false )
	{
		document.querySelector('[id^="libe"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="libe"]').style.boxShadow = "initial";
	}
    
};
//control avant submit
function checkSubmitModificationPrix()
{
	var error = false;

	

	if ( document.querySelector('[id^="Desc"]').value == "" || document.querySelector('[id^="Desc"]').value.length < 2  )
	{
		document.querySelector('[id^="Desc"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="Desc"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="prix"]').value == "" ||  !document.querySelector('[id^="prix"]').value.match(numbers) )
	{
		document.querySelector('[id^="prix"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prix"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="qtt"]').value =="" ||  !document.querySelector('[id^="qtt"]').value.match(numbers)  )
	{
		document.querySelector('[id^="qtt"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="qtt"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

        if ( error == true )
	{
		alert("Champ(s) non rempli(s) ou incorrect(s) ");
               
		return false;
              
	}
	else
	{
		return true;
	}
};
