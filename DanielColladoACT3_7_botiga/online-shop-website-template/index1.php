<?php
session_start(); //creem la sessió
if (isset($_REQUEST["Sortir"])) {
    session_destroy();
    header("location:inis.php");
}


if (!isset($_SESSION["nom"])) {
    session_destroy();
    header("location:inis.php");
}
include 'conexio.php';
if ($_SESSION["nom"] == md5("compra")) {
    if (isset($_REQUEST["paginacio"])) {
        $inici = $_REQUEST["paginacio"];
    } else {
        $inici = 0;
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>MultiShop - Online Shop Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <script>
        window.onload = function () {
            var element = document.getElementById("productos");
            var topPos = (element.offsetHeight / 2) + element.offsetTop;
            window.scrollTo(0, topPos);
        }
    </script>

    <body>
        <!-- Topbar Start -->
        <div class="container-fluid">
            <div class="row bg-secondary py-1 px-xl-5">

                <div class="col-lg-6 text-center text-lg-right">

                    <div class="d-inline-flex align-items-center d-block d-lg-none">
                        <a href="" class="btn px-0 ml-2">
                            <i class="fas fa-heart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle"
                                style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="" class="btn px-0 ml-2">
                            <i class="fas fa-shopping-cart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle"
                                style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
                <div class="col-lg-4">
                    <a href="" class="text-decoration-none">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                    </a>
                </div>
                <div class="col-lg-4 col-6 text-left">
                    <?php
                    $busqueda = 0;
                    if (isset($_REQUEST["botonBusc"])) {
                        $busqueda = 1;
                        $palabraBuscar = explode(" ", $_REQUEST["palabra"]);
                        // $impresos=0; 
                        // $paginacio=0;    
                        $inici = 0;
                    }

                    ?>
                    <form method="POST">
                        <div class="input-group">
                            <input type="text" name="palabra" class="form-control" placeholder="Search for products">
                            <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-primary" type="submit"
                                    name="botonBusc"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-6 text-right">
                    <p class="m-0">Customer Service</p>
                    <h5 class="m-0">+012 345 6789</h5>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <div class="container-fluid bg-dark mb-30">
            <div class="row px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    
                    <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
                        href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                        <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
                    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                        id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                        <div class="navbar-nav w-100">
                            <div class="nav-item dropdown dropright">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i
                                        class="fa fa-angle-right float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                    <a href="" class="dropdown-item">Men's Dresses</a>
                                    <a href="" class="dropdown-item">Women's Dresses</a>
                                    <a href="" class="dropdown-item">Baby's Dresses</a>
                                </div>
                            </div>
                            <a href="" class="nav-item nav-link">Shirts</a>
                            <a href="" class="nav-item nav-link">Jeans</a>
                            <a href="" class="nav-item nav-link">Swimwear</a>
                            <a href="" class="nav-item nav-link">Sleepwear</a>
                            <a href="" class="nav-item nav-link">Sportswear</a>
                            <a href="" class="nav-item nav-link">Jumpsuits</a>
                            <a href="" class="nav-item nav-link">Blazers</a>
                            <a href="" class="nav-item nav-link">Jackets</a>
                            <a href="" class="nav-item nav-link">Shoes</a>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                            <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index1.php" class="nav-item nav-link active">Home</a>
                                <a href="cart.php" class="nav-item nav-link">Pagar</a>

                                <form action="" method="POST">
                                    <a href="" class="nav-item nav-link bg-dark"><input
                                            class="nav-item nav-link bg-dark p-2" type="submit" name="Sortir" value="Sortir"
                                            id=""></a>
                                </form>
                            </div>
                            <!-- <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                <a href="" class="btn px-0">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle"
                                        style="padding-bottom: 2px;">0</span>
                                </a>
                                <a href="cart.php" class="btn px-0 ml-3">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle"
                                        style="padding-bottom: 2px;">0</span>
                                    <?php
                                    // echo $_SESSION["cuenta_articulos"]
                                    ?>
                                </a>
                            </div> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid mb-3">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#header-carousel" data-slide-to="1"></li>
                            <li data-target="#header-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item position-relative active" style="height: 430px;">
                                <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg"
                                    style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men
                                            Fashion</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item position-relative" style="height: 430px;">
                                <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg"
                                    style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women
                                            Fashion</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item position-relative" style="height: 430px;">
                                <img class="position-absolute w-100 h-100" src="img/carousel-3.jpg"
                                    style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids
                                            Fashion</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-offer mb-30" style="height: 200px;">
                        <img class="img-fluid" src="img/offer-1.jpg" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save 20%</h6>
                            <h3 class="text-white mb-3">Special Offer</h3>
                            <a href="" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                    <div class="product-offer mb-30" style="height: 200px;">
                        <img class="img-fluid" src="img/offer-2.jpg" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save 20%</h6>
                            <h3 class="text-white mb-3">Special Offer</h3>
                            <a href="" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Featured Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                        <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                        <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                        <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured End -->




        <div id="productos"></div>
        <!-- Products Start -->
        <div class="container-fluid pt-5 pb-3">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                    Products</span></h2>
            <div class="row px-xl-5 d-flex justify-content-center">


                <?php
                if (isset($_POST["anadir"])) {



                    $_SESSION["carro"][] = $_POST["anadir"];
                    // foreach ($_SESSION["carro"] as $key => $value) {
                    //     echo $value . ",";
                    // }
                    // $_SESSION["cuenta_articulos"]=count(array_count_values($_SESSION["carro"]));
                    // $result[]=array_count_values($_SESSION["carro"]);
                    ?>
                    <script>
                        alert("Producto añadido al carro de compra");

                    </script>
                    <?php
                }
                ?>
                <?php
                $anteriors = 0;
                $proper = 0;
                $linies = 3;
                $impresos = 0;
                if ($busqueda == 1) {

                    $max = sizeof($palabraBuscar);

                    $sql_linea = "SELECT * FROM producte WHERE ";
                    for ($i = 0; $i < count($palabraBuscar); $i++) {

                        if ($i == (count($palabraBuscar)) - 1) {
                            $sql_linea .= "nom LIKE '%" . $palabraBuscar[$i] . "%' limit $inici,$linies";

                        } else {
                            $sql_linea .= "nom LIKE '%" . $palabraBuscar[$i] . "%' AND ";
                        }
                    }


                } else {
                    $sql_linea = "SELECT * FROM producte limit $inici,$linies";
                    $buscador = 0;
                }
                $resul2 = mysqli_query($conexion, $sql_linea);
                while ($fila = mysqli_fetch_assoc($resul2)) {
                    $impresos++;
                    echo '<div class="col-lg-3 col-md-4 col-sm-6 pb-1 ">';
                    echo '<div class="product-item bg-light mb-4 ">';
                    echo '<div class="product-img position-relative overflow-hidden ">';
                    $tipus = $fila["tipusImatge"];
                    $dadesImatge = $fila["dadesImatge"];
                    echo '<img class="img-fluid w-100 m-3" src="data:' . $tipus . ';base64,' . base64_encode($dadesImatge) . '" >';
                    echo '<div class="product-action">';


                    echo '</div>';
                    echo '</div>';
                    // echo '<img src="data:'.$tipus.';base64,'.base64_encode($dadesImatge).'" width="300px">';
                    echo '<div class="text-center py-4">';
                    echo '<a class="h6 text-decoration-none text-truncate" href="">' . $fila["nom"] . '</a>';
                    echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                    $precioA = $fila["preu"] + 30;
                    echo '<h5>' . $fila["preu"] . '€</h5><h6 class="text-muted ml-2"><del>' . $precioA . '€</del></h6>';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                    echo '<small class="fa fa-star text-primary mr-1"></small>';
                    echo '<small class="fa fa-star text-primary mr-1"></small>';
                    echo '<small class="fa fa-star text-primary mr-1"></small>';
                    echo '<small class="fa fa-star text-primary mr-1"></small>';
                    echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                    echo '<small>(99)</small>';
                    echo '<form method="POST">';
                    // echo  '  <a class="btn btn-outline-dark btn-square"  href=""><i class="fa fa-shopping-cart"></i></a>';
                    // echo'<input class=" btn btn-outline-dark btn-square" type="submit"   name="anadir" id="'.$fila["codiProducte"].'" <i class="fa fa-shopping-cart"></i>';
                    echo '<button type="submit" class="m-2 btn btn-outline-dark btn-square"   name="anadir" value="' . $fila["codiProducte"] . '"><i class="fa fa-shopping-cart" ></i></button>';
                    echo '</form>';
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                    echo '</div> ';
                    echo '<br>';


                }
                echo '</div>';
                echo '<div class="d-flex justify-content-center">';
                mysqli_close($conexion);
                if ($inici == 0) {

                    echo "<button class='btn btn-primary w-25 m-5'>Anteriors</button>";
                } else {
                    $anteriors = $inici - $linies;
                    echo "<a class='btn btn-primary w-25 m-5' href=\"index1.php?paginacio=$anteriors\" onclick='goToPage($anteriors)'>Anteriors</a>";
                }
                echo "<a class='btn btn-primary w-25 m-5' href=\"cart.php\">PAGAR</a>";
                echo "<br>";
                if ($impresos == $linies) {
                    $proper = $inici + $linies;
                    echo "<a class='btn btn-primary w-25 m-5'  href=\"index1.php?paginacio=$proper\" onclick='goToPage($proper)'>Seguents</a>";
                } else {
                    echo "<button  class='btn btn-primary w-25 m-5'>Següents</button>";
                }
                echo '</div>';
                ?>

            </div>



            <!-- Offer Start -->
            <div class="container-fluid pt-5 pb-3">
                <div class="row px-xl-5">
                    <div class="col-md-6">
                        <div class="product-offer mb-30" style="height: 300px;">
                            <img class="img-fluid" src="img/offer-1.jpg" alt="">
                            <div class="offer-text">
                                <h6 class="text-white text-uppercase">Save 20%</h6>
                                <h3 class="text-white mb-3">Special Offer</h3>
                                <a href="" class="btn btn-primary">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-offer mb-30" style="height: 300px;">
                            <img class="img-fluid" src="img/offer-2.jpg" alt="">
                            <div class="offer-text">
                                <h6 class="text-white text-uppercase">Save 20%</h6>
                                <h3 class="text-white mb-3">Special Offer</h3>
                                <a href="" class="btn btn-primary">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Offer End -->


            <!-- Products Start -->
            <!-- <div class="container-fluid pt-5 pb-3">
                <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                        class="bg-secondary pr-3">Recent Products</span></h2>
                <div class="row px-xl-5">
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-6.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-7.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/product-8.jpg" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Products End -->


            <!-- Vendor Start -->
            <div class="container-fluid py-5">
                <div class="row px-xl-5">
                    <div class="col">
                        <div class="owl-carousel vendor-carousel">
                            <div class="bg-light p-4">
                                <img src="img/logoqpp.jpg" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/sams.jpg" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/canon.jpg" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/bo.jpg" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/mi.png" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/vendor-6.jpg" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/vendor-7.jpg" alt="">
                            </div>
                            <div class="bg-light p-4">
                                <img src="img/vendor-8.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vendor End -->


            <!-- Footer Start -->
            <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
                <div class="row px-xl-5 pt-5">
                    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                        <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                        <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed
                            dolor. Rebum tempor no vero est magna amet no</p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our
                                        Shop</a>
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                        Detail</a>
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping
                                        Cart</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Checkout</a>
                                    <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our
                                        Shop</a>
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                        Detail</a>
                                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping
                                        Cart</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Checkout</a>
                                    <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                                <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Your Email Address">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Sign Up</button>
                                        </div>
                                    </div>
                                </form>
                                <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-square mr-2" href="#"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-square mr-2" href="#"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
                    <div class="col-md-6 px-xl-0">
                        <p class="mb-md-0 text-center text-md-left text-secondary">
                            &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                            by
                            <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                        </p>
                    </div>
                    <div class="col-md-6 px-xl-0 text-center text-md-right">
                        <img class="img-fluid" src="img/payments.png" alt="">
                    </div>
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            
            
            <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Contact Javascript File -->
            <script src="mail/jqBootstrapValidation.min.js"></script>
            <script src="mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
    </body>

    </html>
    <?php
} else {
    session_destroy();
    header("location:inis.php");
}
?>