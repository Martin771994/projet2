<?php

// On inclus notre fichier db.php pour accéder à la variable $pdo
require(__DIR__.'/db.php');

// On initialise la variable $brandList avec un tableau vide
$brandList = [];

// On stocke dans la variable $sql, notre requête
// La requête permet de récupérer toutes les colonnes dans la table brand
// là où footer_order est différent de 0
// Et ordonnez par footer_order
// Limiter à 5 items
$sql = '
    SELECT *
    FROM brand
    WHERE footer_order != 0
    ORDER BY footer_order
    LIMIT 5
';

// On stocke dans la variable $stmt, l'execution de la requête
// $pdo appelle la méthode query
// query a pour argument la variable $sql (la string de la requête)
$stmt = $pdo->query($sql);

// On utilise fetchALl afin de récupérer les valeurs de la requête SQL
// L'argument de la méthode fetchAll spécifie le type de tableau pour mon résultat
// Dans le cas PDO::FETCH_ASSOC, le résultat sera un tableau associatif
$brandList = $stmt->fetchAll(PDO::FETCH_ASSOC);
