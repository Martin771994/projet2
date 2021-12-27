<?php

include '../layout/header.php';

?>

  <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Panier</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">Panier</h1>
          <div class="row">
            <!-- On utilise la fonction PHP count pour connaitre la taille de notre tableau $_SESSION['cart'] -->
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">Vous avez <?= count($_SESSION['cart']) ?> produits dans votre panier</p></div>
          </div>
        </div>
      </div>
    </section>
  <section>
      <div class="container">
        <div class="row mb-5"> 
          <div class="col-lg-8">
            <div class="cart">
              <div class="cart-wrapper">
                <div class="cart-header text-center">
                  <div class="row">
                    <div class="col-5">Produit</div>
                    <div class="col-2">Prix</div>
                    <div class="col-2">Quantité</div>
                    <div class="col-2">Total</div>
                    <div class="col-1"></div>
                  </div>
                </div>
                <div class="cart-body">
                  <!-- Product-->
                  <?php
                    // Si le tableau $_GET à la clé keyCartDelete est différent de vide
                    if (!empty($_GET['keyCartDelete'])) {
                      // https://www.php.net/manual/fr/function.unset.php
                      // A l'aide de la fonction unset, ce qui se trouve dans le tableau $_SESSION
                      // à la clé cart
                      // puis à la clé récupérer dans le paramètre GET
                      // c'est à dire la clé du tableau associatif du produit
                      unset($_SESSION['cart'][$_GET['keyCartDelete']]);
                    }
                  ?>
                  <!-- On parcours le tableau de $_SESSION à l'index cart et on récupère à chaque itération la clé ($key) 
                  et la valeur ($cartItem) -->
                  <?php foreach($_SESSION['cart'] as $key => $cartItem) : ?>
                  <div class="cart-item">
                    <div class="row d-flex align-items-center text-center">
                      <div class="col-5">
                        <div class="d-flex align-items-center"><a href="detail.html"><img src="../<?= $cartItem['picture'] ?>" alt="..." class="cart-item-img"></a>
                          <div class="cart-title text-left"><a href="detail.html" class="text-uppercase text-dark"><strong><?= $cartItem['name'] ?></strong></a><br><span class="text-muted text-sm">Taille : Large</span><br>
                            <span class="text-muted text-sm">Couleur : Jaune</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-2"><?= $cartItem['price'] ?></div>
                      <div class="col-2">
                        <div class="d-flex align-items-center">
                        <!-- Formulaire pour baisser la quantité -->
                        <form action="<?= pathUrl().'inc/sessionForm.php' ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $key ?>">
                        <button name="moins" type="submit" class="btn btn-items btn-items-decrease">-</button>
                          </form>
                        <!-- Formulaire pour baisser la quantité -->
                          <input value="<?= $cartItem['quantity'] ?>" class="form-control text-center input-items" type="text">
                        <!-- Formulaire pour augmenter la quantité -->
                          <form action="<?= pathUrl().'inc/sessionForm.php' ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $key ?>">
                            <button name="plus" type="submit" class="btn btn-items btn-items-increase">+</button>
                          </form>
                        <!-- Formulaire pour augmenter la quantité -->
                        </div>
                      </div>
                      <!-- Pour affiche le total d'un produit, il faut multiplier le prix de l'item avec sa quantité 
                      à travers les valeurs du tableau $_SESSION
                      https://www.php.net/manual/fr/function.intval.php
                      -->
                      <div class="col-2 text-center"><?= intval($cartItem['price'])*intval($cartItem['quantity']) ?></div>
                      <!-- le href contient la syntaxe GET avec pour cle keyCArtDelete et pour valeur la clé de la boucle courante -->
                      <div class="col-1 text-center"><a href="?keyCartDelete=<?= $key ?>" class="cart-remove"> <i class="fa fa-times"></i></a></div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <!-- Product-->
                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-between flex-column flex-lg-row"><a href="category.html" class="btn btn-link text-muted"><i class="fa fa-chevron-left"></i> Continuer les achats</a><a href="checkout1.html" class="btn btn-dark">Commander <i class="fa fa-chevron-right"></i>                                                     </a></div>
          </div>
          <div class="col-lg-4">
            <div class="block mb-5">
              <div class="block-header">
                <h6 class="text-uppercase mb-0">Récapitulatif</h6>
              </div>
              <div class="block-body bg-light pt-1">
                <p class="text-sm">Le coût de livraison est calculé en fonction des produits choisis</p>
                <ul class="order-summary mb-0 list-unstyled">
                  <?php
                  // la variable $total est initialisé à 0
                  $total = 0;
                  // Le foreach permet de parcourir le tableau de $_SESSION à la clé cart
                  foreach($_SESSION['cart'] as $cartItem) {
                    // la variable $total va ajouter à chaque passage de boucle le prix multiplié par la quantité
                    // pour chaque produits du panier
                    $total += intval($cartItem['price'])*intval($cartItem['quantity']);
                  }

                  if ($total < 100) {
                    $total += 10;
                    $delivery = 10;
                  } else {
                    $delivery = 0;
                  }
                  ?>
                  <li class="order-summary-item"><span>Sous total</span><span><?= $total ?>€</span></li>
                  <li class="order-summary-item"><span>Livraison</span><span><?= $delivery ?>€</span></li>
                  <li class="order-summary-item"><span>TVA</span><span>0€</span></li>
                  <li class="order-summary-item border-0"><span>Total</span><strong class="order-summary-total"><?= $total ?>€</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php

include '../layout/footer.php'

?>