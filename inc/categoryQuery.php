<?php

// On récupère la variable $pdo contenant la connexion à la base de donnée
require(__DIR__.'/db.php');

// On initialise la variable $categoryList avec un array vide (tableau vide)
$categoryList = array();

// La variable $sql stock la requête permettant de récupérer
// Toutes les lignes de la table catégories
// Là où home_order est différent de 0
// Ordonner par home_order
// Limité à 5 lignes
$sql = '
    SELECT *
    FROM category
    WHERE home_order != 0
    ORDER BY home_order
    LIMIT 5
';

// La variable $stmt contient l'execution de ma requête SQL
$stmt = $pdo->query($sql);

// On remplit le tableau $categoryList avec la récupération de 
// notre résultat de requête sous forme de tableau associatif
// qui aura pour clé le nom de la colonne de la table category
// et pour valeur la valeur de la colonne de la table category
$categoryList = $stmt->fetchAll(PDO::FETCH_ASSOC);