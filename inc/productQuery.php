<?php

// L'import de la varaiable $pdo contenant la connexion à la base de données
require(__DIR__.'/db.php');

// La variable $productList qui est initialisé avec un tableau vide
$productList = array();

// La variable $sql contient une string avec la requête SQL
// permettant de récuperer toutes les lignes et colonnes de la table produits
// Et la colonne name de la table type sous la forme d'un alias
// On donne un alias à type.name car une colonne name existe ègalement dans la table product
// afin de ne pas créer de conflit, on lui donne le nom type_name
// La jointure permet d'associer la clé primaire de la table type 
// à la clé étrangère type_id de la table product
$sql = '
    SELECT product.*, type.name as type_name
    FROM product
    JOIN Type ON product.type_id = type.id
';

// Si ma variable $_GET n'est pas vide à la clé ['order']
// Cela veut dire que j'ai bien récupérer une valeur
// dans mon tableau $_GET à la clé order
if(!empty($_GET['order'])) {
    // la variable $order $stocke la valeur du tableau $_GET à la clé ['order']
    $order = $_GET['order'];

    // Si la variable $order est ègale à 'rate'
    if ($order == 'rate') {
        // la variable $tri stocke 'DESC'
        $tri = 'DESC';
    //sinon
    } else {
        // la variable $tri stocke 'ASC'
        $tri = 'ASC';
    }

    // la variable $sql stocke dans cette condition la requête ci-dessous
    // La variable $sql contient une string avec la requête SQL
    // permettant de récuperer toutes les lignes et colonnes de la table produits
    // Et la colonne name de la table type sous la forme d'un alias
    // On donne un alias à type.name car une colonne name existe ègalement dans la table product
    // afin de ne pas créer de conflit, on lui donne le nom type_name
    // La jointure permet d'associer la clé primaire de la table type 
    // à la clé étrangère type_id de la table product
    // Ordonné par prix ou popularité selon ce qui est stocké dans la variable $order
    // Ordonné également de manière croissant ou décroissant selon la valeur stocké dans $tri
    $sql = '
        SELECT product.*, type.name as type_name
        FROM product
        JOIN Type ON product.type_id = type.id
        ORDER BY '.$order.' '.$tri.'
    ';
}

// Si le tableau $_GET à la clé status est différent de vide
if(!empty($_GET['status'])) {
    // La variable $status stocke la valeur de $_GET à la clé status
    $status = $_GET['status'];

    // la variable $sql stocke dans cette condition la requête ci-dessous
    // La variable $sql contient une string avec la requête SQL
    // permettant de récuperer toutes les lignes et colonnes de la table produits
    // Et la colonne name de la table type sous la forme d'un alias
    // On donne un alias à type.name car une colonne name existe ègalement dans la table product
    // afin de ne pas créer de conflit, on lui donne le nom type_name
    // La jointure permet d'associer la clé primaire de la table type 
    // à la clé étrangère type_id de la table product
    // La condition WHERE permet de récupérer seulement les produits ayant pour status, le 1
    $sql = '
        SELECT product.*, type.name as type_name
        FROM product
        JOIN Type ON product.type_id = type.id
        WHERE status = '.$status.'
    ';
}

// Si le tableau $_GET à la clé category est différent de vide
if(!empty($_GET['category'])) {
    // la variable $category stocke la valeur du tableau $_GET à la clé category
    $category = $_GET['category'];

    // la variable $sql stocke dans cette condition la requête ci-dessous
    // La variable $sql contient une string avec la requête SQL
    // permettant de récuperer toutes les lignes et colonnes de la table produits
    // Et la colonne name de la table type sous la forme d'un alias
    // On donne un alias à type.name car une colonne name existe ègalement dans la table product
    // afin de ne pas créer de conflit, on lui donne le nom type_name
    // La jointure permet d'associer la clé primaire de la table type 
    // à la clé étrangère type_id de la table product
    // La condition WHERE permet de récupérer seulement les produits ayant pour category_id
    // La valeur stocké dans la variable $category
    $sql = '
        SELECT product.*, type.name as type_name
        FROM product
        JOIN Type ON product.type_id = type.id
        WHERE category_id = '.$category.'
    ';
}

// $stmt stocke l'execution de la requête $sql
$stmt = $pdo->query($sql);

// Le tableau $productList est rempli avec le résultat de la requête $sql executer
// $productlist contiendra à ses différents index, un tableau associatifs
// rempli avec les valeurs des colonnes requis pour chaque ligne
$productList = $stmt->fetchAll(PDO::FETCH_ASSOC);