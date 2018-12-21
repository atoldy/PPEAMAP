<?php
    session_start();
	session_destroy();
        supprimePanier();
	header('Location: index.php');      
?>