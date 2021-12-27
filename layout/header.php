<?php

require(__DIR__.'/../pathUrl.php');

// Session start nous permet de démarrer notre $_SESSION, c'est à dire, qu'à partir du moment où mon code appliquela fonction
// session_start(), je pourrais manipuler le tableau de $_SESSION
session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href=<?= pathUrl()."/html/public/assets/css/bootstrap.min.css"?>>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href=<?= pathUrl()."/html/public/assets/css/owl.carousel.min.css"?>>
  <link rel="stylesheet" href=<?= pathUrl()."/html/public/assets/css/owl.theme.default.min.css"?>>
  <link rel="stylesheet" href=<?= pathUrl()."/html/public/assets/css/styles.css"?>>
  <title>shop</title>
</head>

<body>
    <header>
      <div class="top-bar">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-sm-7 d-none d-sm-block">
              <ul class="list-inline mb-0">
                <li class="list-inline-item pr-3 mr-0">
                  <i class="fa fa-phone"></i> 01 02 03 04 05
                </li>
                <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">Livraison offerte à partir de 100€</li>
              </ul>
            </div>
            <div class="col-sm-5 d-flex justify-content-end">
              <!-- Currency Dropdown-->
              <div class="dropdown pl-3 ml-0">
                <a id="currencyDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle topbar-link">EUR</a>
                <div aria-labelledby="currencyDropdown" class="dropdown-menu dropdown-menu-right">
                  <a href="#" class="dropdown-item text-sm">USD</a>
                  <a href="#" class="dropdown-item text-sm">GBP</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light">
            <div class="container-fluid">
                <!-- Navbar Header  -->
                <a href="#" class="navbar-brand">shop</a>
                <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i
                        class="fa fa-bars"></i></button>
                <!-- Navbar Collapse -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="<?= pathUrl().'index.php' ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= pathUrl().'view/category.php' ?>" class="nav-link">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Marques</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-between justify-content-lg-end mt-1 mb-2 my-lg-0">
                        <!-- Search Button-->
                        <div class="nav-item navbar-icon-link">
                            <a href="#" class="navbar-icon-link"><i class="fa fa-search"></i></a>
                        </div>
                        <!-- User Not Logged - link to login page-->
                        <div class="nav-item">
                            <a href="#" class="navbar-icon-link"><i class="fa fa-user"></i></a>
                        </div>
                        <!-- Cart Dropdown-->
                        <div class="nav-item dropdown">
                            <div class="d-none d-lg-block">
                                <a id="cartdetails" href="<?= pathUrl().'view/cart.php'; ?>" class="navbar-icon-link">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-secondary">2</span>
                                      <a id="dropdownCart" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle topbar-link"></a>
                                      <div aria-labelledby="dropdownCart" class="dropdown-menu dropdown-menu-right">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>
    </header>