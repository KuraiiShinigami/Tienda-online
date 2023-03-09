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
    $carro_mes_gran = false;
    
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

    <body>
        <!-- Topbar Start -->
        <div class="container-fluid">
            <!--  -->
            <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
                <div class="col-lg-4">
                    <a href="" class="text-decoration-none">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                    </a>
                </div>
                <div class="col-lg-4 col-6 text-left">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for products">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
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
                <!--  -->
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
                                <a href="index1.php" class="nav-item nav-link">Home</a>

                                <form action="" method="POST">
                                    <a href="" class="nav-item nav-link bg-dark "><input
                                            class="nav-item nav-link bg-dark p-2" type="submit" name="Sortir" value="Sortir"
                                            id=""></a>
                                </form>
                            </div>
                            <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                <a href="" class="btn px-0">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle"
                                        style="padding-bottom: 2px;">0</span>
                                </a>
                                <a href="" class="btn px-0 ml-3">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle"
                                        style="padding-bottom: 2px;">0</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12">
                    <nav class="breadcrumb bg-light mb-30">
                        <a class="breadcrumb-item text-dark" href="#">Home</a>
                        <a class="breadcrumb-item text-dark" href="#">Shop</a>
                        <span class="breadcrumb-item active">Shopping Cart</span>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Cart Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>

                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                            $suma_total = 0;

                            if (isset($_SESSION["carro"])) {
                                $sql_linea = "SELECT * FROM producte";
                                $resul2 = mysqli_query($conexion, $sql_linea);
                                while ($fila = mysqli_fetch_assoc($resul2)) {
                                    $stock = $fila["stock"];
                                    $contador_productes_totals = 0;
                                    




                                    foreach ($_SESSION["carro"] as $key => $value) {
                                        if ($value == $fila["codiProducte"] && $contador_productes_totals < $stock) {
                                            if ($stock == 1) {

                                                unset($_SESSION["carro"]);

                                                ?>
                                                <script>
                                                    alert("Sentimos las molestias, no queda stock, vaciando carro y volviendo al inicio");
                                                    window.location.href = "index1.php";
                                                </script>
                                                <?php

                                            }
                                            $contador_productes_totals++;
                                            $nom_producte = $fila["nom"];
                                            // echo $fila["nom"];
                                            // $quantitat++;
                                            $tipus = $fila["tipusImatge"];
                                            $dadesImatge = $fila["dadesImatge"];

                                            echo " <tr>";

                                            echo '<td><img style="width: 50px;" class="img-fluid" src="data:' . $tipus . ';base64,' . base64_encode($dadesImatge) . '" >'.$fila["nom"].'</td>';
                                            // "<td class='align-middle'><img src='img/product-1.jpg' alt="" style='width: 50px;'> Product Name</td>
                                            echo "<td class='align-middle'>" . $fila['preu'] . "€</td>
                                    <td class='align-middle'>
                                        <div class='input-group quantity mx-auto' style='width: 100px;'>
                                            <div class='input-group-btn'>
                                                
                                            </div>
                                            <p class='form-control form-control-sm bg-secondary border-0 text-center'>1</p>
                                            <div class='input-group-btn'>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td class='align-middle'>" . $fila['preu'] . "€</td>
                                    <input type='hidden' id='hid' value='$stock'>
                                    </tr>";
                                            $suma_total += $fila['preu'];
                                        }
                                    }
                                    $num_carro = $contador_productes_totals;
                                    if ($stock < $num_carro) {
                                        $carro_mes_gran = true;

                                    }


                                }
                            }



                            ?>



                        </tbody>
                    </table>
                    <br>
                    <?php
                    if ($carro_mes_gran) {
                        echo "Debido a problemas de stock, este es el máximo de productos disponible para comprar";

                    }

                    ?>
                </div>
                <div class="col-lg-4">
                    <form class="mb-30" action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                            Summary</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <?php

                                echo "<h6>" . $suma_total . "€</h6>";
                                ?>

                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">10€</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <?php
                                $suma_total += 10;
                                echo "<h5>" . $suma_total . "€</h5>";
                                ?>
                            </div>


                            <?php
                            $productos_finales = [];
                            $cp = "";
                            if (isset($_SESSION["carro"])) {
                                if (isset($_POST["comprar"])) {

                                    foreach ($_SESSION["carro"] as $key => $value) {
                                        $sql_linea = "SELECT * FROM producte WHERE codiProducte =$value";
                                        $resul2 = mysqli_query($conexion, $sql_linea);
                                        $contador_productes_totals = 0;
                                        $vendido = false;
                                        while ($fila = mysqli_fetch_assoc($resul2)) {
                                            $contador_productes_totals++;

                                            $stock = $fila["stock"];
                                            if ($stock != 0) {
                                                $productos_finales[] = $fila["codiProducte"];
                                            }



                                        }
                                        if ($stock > $contador_productes_totals) {

                                            $sql2 = "UPDATE producte set stock=stock-$contador_productes_totals WHERE codiProducte=$value";
                                            $resul2 = mysqli_query($conexion, $sql2);
                                            if (mysqli_affected_rows($conexion) == 1) {
                                                // aqui puedo coger todos productos
                                                $vendido = true;
                                            } else {
                                                echo 'error';
                                            }
                                        }
                                    }
                                    if ($vendido) {
                                        $mail = $_SESSION["email"];
                                        echo $mail;

                                        $sql3 = "INSERT INTO compra(data, email) VALUES(sysdate(), '$mail')";
                                        mysqli_query($conexion, $sql3);
                                        if (mysqli_affected_rows($conexion) == 1) {

                                            $cp = mysqli_insert_id($conexion);
                                            foreach ($productos_finales as $key => $value) {
                                                
                                                $sql4 = "INSERT INTO comanda(codiCompra, codiProducte) VALUES($cp, '$value')";
                                                mysqli_query($conexion, $sql4);
                                                if (mysqli_affected_rows($conexion) == 1) {
                                                    $finiq = true;

                                                } else {
                                                    echo "mal";
                                                }
                                            }

                                            if ($finiq) {

                                                unset($_SESSION["carro"]);

                                                ?>
                                                <script>
                                                    alert("Compra realitzada, tornant al inici...");
                                                    window.location.href = "index1.php";
                                                </script>
                                                <?php



                                            }
                                        } else {
                                            echo "mal";
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <script>

                                    alert("Carro vacio!!!!! Vuelve a la pagina de compra");

                                </script>
                                <?php

                            }

                            ?>

                            <form method="POST">
                                <input type="submit" name="comprar"
                                    class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Pagar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                    <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor.
                        Rebum tempor no vero est magna amet no</p>
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

                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                    Detail</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping
                                    Cart</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
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
                                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
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


    <!-- 

                                        primero hacer insert tabla compra
                                        y despues insert comanda con todos los productos más el id de compra
                                         -->

    <?php
} else {
    session_destroy();
    header("location:inis.php");
}
?>