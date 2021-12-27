<?php

// on a ininitialiser nos variables avec les valeurs de l'hote et le nom de la base de données
$dsn = 'mysql:host=localhost;dbname=shop';

// Le nom d'utilisateur
$user = 'root';

// Le mot de passe
$pass = '';

// Les options de récupération des erreurs
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

// On va stocké dans la variable $pdo, la connexion à notre base de données
$pdo = new PDO($dsn, $user, $pass, $options);