<?php

include './layout/header.php';

require(__DIR__.'/inc/categoryQuery.php');


?>

<section class="home-carousel">
    <div class="owl-carousel owl-theme">
      <div class="item">
        <img src="images/slider-1.jpg" alt="">
        <div class="container-fluid h-100 py-5">
          <div class="row align-items-center h-100">
            <div class="col-lg-8 col-xl-6 mx-auto text-white text-center">
              <h5 class="text-uppercase text-white font-weight-light mb-4 letter-spacing-5">Nouveau</h5>
              <h1 class="mb-5 display-2 font-weight-bold text-serif">Blue lagoon</h1>
              <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p> <a href="#" class="btn btn-light">Voir la collection</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="images/slider-2.jpg" alt="">
        <div class="container-fluid h-100 py-5">
          <div class="row align-items-center h-100">
            <div class="col-lg-8 col-xl-6 mx-auto text-white text-center">
              <h5 class="text-uppercase text-white font-weight-light mb-4 letter-spacing-5">Meilleure vente</h5>
              <h1 class="mb-5 display-2 font-weight-bold text-serif">Tennis jogger</h1>
              <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p> <a href="#" class="btn btn-light">Voir les modèles</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="images/slider-3.jpg" alt="">
        <div class="container-fluid h-100 py-5">
          <div class="row align-items-center h-100">
            <div class="col-lg-8 col-xl-6 mx-auto text-white text-center">
              <h5 class="text-uppercase text-white font-weight-light mb-4 letter-spacing-5">Classique</h5>
              <h1 class="mb-5 display-2 font-weight-bold text-serif">Relax slippers</h1>
              <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p> <a href="#" class="btn btn-light">Découvrir</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-fluid">
      <div class="row mx-0">
        <!-- Le foreach permet de parcourir le tableau $categoryList
        On récupère à chaque passage de boucle un tableau associatif
        dans la variable $category -->
        <?php foreach($categoryList as $category) : ?>
          <!-- Si $category['home_order'] de l'élément en cours d'itération 
          est plus grand que 2 alors on afiiche le html ci-après-->
          <?php if($category['home_order'] > 2) : ?>
            
          <div class="col-lg-4">
  
          <!-- Traduction de la condition ternaire ligne 75 -->

            <?php

            // if ($category['home_order'] == 4) {
            //   $class = 'text-dark';
            // } else {
            //   $class = 'text-white';
            // }

            ?>
            <!-- <div class="card border-0 text-center </?php echo $class ?>"><img src="</?= $category['picture'] ?>"alt="Card image" class="card-img"> -->

            <!-- Fin traduction ternaire -->
            <div class="card border-0 text-center <?php echo $category['home_order'] == 4 ? 'text-dark' : 'text-white' ?>"><img src="<?= $category['picture'] ?>"
                alt="Card image" class="card-img">
              <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100">
                  <h2 class="display-4 mb-4"><?= $category['name'] ?></h2><a href="category.html" class="btn btn-link <?= $category['home_order'] == 4 ? 'text-dark' : 'text-white' ?>"><?= $category['subtitle'] ?>
                    <i class="fa-arrow-right fa ml-2"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!--  Sinon le html ci-dessous sera pris en compte -->
        <?php else : ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $category['picture'] ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $category['name'] ?></h2><a href="category.html" class="btn btn-light"><?= $category['subtitle'] ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin de condition if -->
        <?php endforeach; ?>
        <!-- Fin de condition foreach -->
      </div>
    </div>
  </section>

<?php

include './layout/footer.php'

?> 