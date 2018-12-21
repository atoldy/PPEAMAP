<?php
// Connexion bdd
try
{$bdd = new PDO('mysql:host=localhost;dbname=bdberrue;charset=utf8','root','');}

catch(Exception $e)
{die('Erreur : '.$e->getMessage());}