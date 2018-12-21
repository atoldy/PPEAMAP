<?php
// Connexion bdd
try
{$bdd = new PDO('mysql:host=localhost;dbname=bdamap;charset=utf8','root','');}

catch(Exception $e)
{die('Erreur : '.$e->getMessage());}