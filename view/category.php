<?php

include '../layout/header.php';

require(__DIR__.'/../inc/productQuery.php');
require(__DIR__.'/../inc/allCategoryQuery.php');

// Embellir le rendu du var_dump

// echo '<pre>';
// var_dump($productList);
// echo '<pre>';

?> 

  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item <?= empty($_GET['category']) ? 'active' : ''; ?>"><a href="category.php">Tous les produits</a></li>
        <!-- Le foreach permet de parcourir le tableau $categoryList 
        à chaque itération de la boucle, je récupère le tableau associatif
        de mon résultat de requête-->
        <?php foreach($categoryList as $category) : ?>
        <!-- le href contient un paramètre get ayant pour clé catégorie et pour valeur l'id de la categorie courante -->
        <li class="breadcrumb-item <?= !empty($_GET['category']) && $_GET['category'] == $category['id'] ? 'active' : ''; ?> "><a href="?category=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
        <?php endforeach; ?>
        <!-- fin foreach -->
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
      <?php if(empty($_GET['category'])) : ?>
        <h1 class="hero-heading">Tous les produits</h1>
      <?php endif; ?>
      <?php foreach($categoryList as $category) : ?>
        <?php
          if(!empty($_GET['category']) && $_GET['category'] == $category['id']) {
            $category = $category['name'];
          } else {
            $category = null;
          }
        ?>
        <?php if ($category != null) : ?>
        <h1 class="hero-heading"><?= $category ?></h1>
        <?php endif; ?>
        <?php endforeach; ?>
        
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
          Affichage </strong>de <strong><?= count($productList) ?> </strong>résultats
        </div>
        <!-- <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a
            href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
        </div> -->
        <div class="mb-3 d-flex align-items-center">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Trier par
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php if(!empty($_GET)) : ?>
            <a class="dropdown-item" href="category.php">Tout</a>
            <?php endif; ?>
            <!-- les href contiennent des chaines de caractères ayant la syntaxe d'un paramètre GET 
            On peut de cette manière remplir le tableau $_GET en envoyant nos clés et valeur avec la syntaxe
            approprié 
            La syntaxe : 
            ?clé=valeur
            Si on a plusieurs éléments :
            ?clé=valeur&clé=valeur&clé=valeur
            -->
            <a class="dropdown-item" href="?order=price">Prix</a>
            <a class="dropdown-item" href="?order=rate">Popularité</a>
            <a class="dropdown-item" href="?status=1">Produits disponibles</a>
            <!-- Fin balise a href GET -->
          </div>
        </div>
        </div>
      </header>
      <div class="row">
        <!-- product-->
        <?php 
        
        //   if (!empty($_GET['cart'])) {
        //     if (empty($_SESSION['cart'])) {
        //         $_SESSION['cart'] = array();
        //     }
        //     $_SESSION['cart'][] = $_GET;
        // }

        ?>
        
        <!-- Le foreach permet de parcourir le tableau $productList
        A chaque iteration on récupère un tableau associatif contenant les valeurs
        de chaque clé pour l'élément courant -->
        <?php foreach($productList as $product) : ?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="../<?= $product['picture'] ?>" alt="product" class="img-fluid">
            </a>
          </div>

          <!-- Formulaire qui a pour action le fichier sessionForm.php et qui a pour méthode, la method POST -->
          <form class="product-action-buttons" action="<?= pathUrl().'inc/sessionForm.php' ?>" method="POST">
            <!-- Input caché (type="hidden") qui contiennent les valeurs du produits (nom, l'image, le prix, quantité) -->
            <input type="hidden" name="name" value="<?= $product['name'] ?>">
            <input type="hidden" name="picture" value="<?= $product['picture'] ?>">
            <input type="hidden" name="price" value="<?= $product['price'] ?>">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <!-- Fin des inputs
            Bouton permettant de soumettre notre formulaire car il est de type submit
            Le bouton comporte un nom, c'est 'addCartSession', ça nous permet de le différencier des autres formulaires -->
            <button name="addCartSession" type="submit"><i class="fa fa-shopping-cart"></i></button>
            <!-- Fin de bouton -->
            <a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </form>
          <!-- Fin de formulaire -->

          <!-- Dans le href de la balise a on retrouve la syntaxe d'un paramètre GET  
          On va don pouvoir récupérer un tableau associatif avec nos valeurs pour chaques produits 
          -->
          <!-- Method GET -->
          <!-- <div class="product-action-buttons">
              <a href="?cart=yes&name=</?= $product['name'].'&picture='.$product['picture'].'&price='.$product['price'].'&quantity=1' ?>" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
              <a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
            </div> -->
          <!-- Method GET -->
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $product['type_name'] ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark"><?= $product['name'] ?></a></h3><span class="text-muted"><?= $product['price'] ?></span>
            <div>
              <!-- La boucle for contient 3 arguments
              Initialiser le compteur à 0
              Stipuler une condition pour le fonctionnement de la boucle
              ici la boucle continue tant que $indexStar est plus petit que $product['rate']
              donc, tant que l'index est plus petit que la note 
              Le compteur est incrément de 1 à chaque passage -->
              <?php for($indexStar = 0; $indexStar < $product['rate']; $indexStar++) : ?>
              <!-- L'icone de l'étoile pleine s'affiche autant de fois que sa note -->
              <i class="fas fa-star"></i>
              <?php endfor; ?>
              <!-- La boucle for contient 3 arguments
              Initialiser le compteur avec la note
              Stipuler une condition pour le fonctionnement de la boucle
              ici la boucle continue tant que $indexStar est plus petit que 5
              donc, tant que l'index est plus petit que la note 
              Le compteur est incrément de 1 à chaque passage -->
              <?php for($indexStar = $product['rate']; $indexStar < 5; $indexStar++) : ?>
              <!-- L'icone de l'étoile vide s'affiche autant de fois que la différence entre la note et 5 -->
              <i class="far fa-star"></i>
              <?php endfor; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <!-- /product-->
      </div>
      
    </div>
  </section>

<?php

var_dump($_SESSION);

include '../layout/footer.php'

?> 