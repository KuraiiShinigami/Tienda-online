<?php
session_start();
include 'conexio.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  </nav>
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
                            <a href="registre.php" class="nav-item nav-link">Registar</a>
                            
                            <!-- <form action="" method="POST">
                                <a href="" class="nav-item nav-link bg-dark"><input class="nav-item nav-link bg-dark"type="submit" name="Sortir"  value="Sortir" id=""></a>
                            </form> -->
                        </div>
                  
                    </div>
                </nav>

                <!-- Inici sesio -->
                <?php
     if(isset($_POST["botonIni"])){
        $tipoPers="";
        $correcto=0;
        $contr=md5($_POST["password"]);
        $mail=$_POST["email"];

        $sql_linea = "SELECT * FROM usuari where password='$contr' and email='$mail'";
        $resul = mysqli_query($conexion, $sql_linea);
            while ($fila = mysqli_fetch_assoc($resul)) {
                $tipoPers=$fila["admin"];  
                $nom=$fila["nom"];
                echo"usuari:$nom";
                $_SESSION["email"]=$fila["email"];
            } 
            if (mysqli_affected_rows($conexion) == 1) {
                $correcto=1;
            
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: Usuari no trobat")';
                echo '</script>';
            
            }
   
    if($tipoPers==1 && $correcto==1){        
        echo '<script type="text/javascript">';
        echo 'alert("Bienvenido admin!")';
        echo '</script>';
        $_SESSION["nom"]=md5("admin");
       
        header('location:admin.php');
    }
    else if($tipoPers==0 && $correcto==1){
            echo '<script type="text/javascript">';
            echo 'alert("Bienvenido comprador!")';   
        echo '</script>';
        $_SESSION["nom"]=md5("compra");
       
        header('location:index1.php');
        }
}

 ?>



    <div class="container-fluid mt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Inici Sesió</span></h2>
        <div class="row px-xl-5 d-flex justify-content-center">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30 d-flex justify-content-center">
                    <!-- <div id="success"></div> -->
                    <form method="POST"  enctype="multipart/form-data"> 
                       
                        <input type="text" name="email" id="" placeholder="email" required>
                        <input type="password" class="mx-3" name="password" id="" placeholder="password" required>
                        </div>
                        <br>
                       
                        <br>                        
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary py-2 px-4" type="submit" name="botonIni" class="">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>