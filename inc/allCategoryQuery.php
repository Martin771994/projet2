<?php

// On importe la connexion à la base de donnée shop dans la variable $pdo
require(__DIR__.'/db.php');

// la variable $categoryList est initialisé avec un tableau vide
$categoryList = array();

// la variable $sql contient la chaine de caractères avec la requête
// La requête permet de récupérer les colonnes id et name
// pour toutes les lignes de la table category
$sql = '
    SELECT id, name
    FROM category
';

// La variable $stmt contient l'execution de la requête stocké dans la variable $sql
$stmt = $pdo->query($sql);

// La variable categoryList est en tableau qu'on remplit avec le résultat de la requête SQL
// Ce tableau contiendra pour chaque ligne de notre requête un tableau associatif avec
// les colonnes id et name pour chaque catégories
$categoryList = $stmt->fetchAll(PDO::FETCH_ASSOC);