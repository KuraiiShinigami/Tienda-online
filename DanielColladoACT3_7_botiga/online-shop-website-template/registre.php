<?php
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
                    <a href="inis.php" class="nav-item nav-link">Iniciar sessió</a>
                    <!-- <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span> -->
                    <!-- </button>  -->
                    <!-- <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"> -->
                        <!-- <div class="navbar-nav mr-auto py-0">
                              <a href="index1.php" class="nav-item nav-link"></a>   -->
                            <!-- <a href="shop.php" class="nav-item nav-link"></a> -->
                            <!-- <a href="detail.php" class="nav-item nav-link"> </a> -->
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.php" class="dropdown-item"> </a>
                                    <a href="checkout.php" class="dropdown-item"></a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link active"></a>
                        </div> -->  
                  
                    </div>
                </nav>

                <!-- registre -->
<?php
    if (isset($_POST["botonReg"])) {
        $nom = $_POST["nom"];
        $cognoms = $_POST["cognoms"];
        $direccio = $_POST["direccio"];
        $email = $_POST["email"];    
        $password = $_POST["password"];
        $direccio = $_POST["direccio"];
        $poblacio = $_POST["poblacio"];
        $cPostal = $_POST["cPostal"];
        $passwFi =md5($password);
        // pasos per guardar la foto al sql
        $rutaTmp= $_FILES["Foto"]["tmp_name"];
        
        $dadesImatge=file_get_contents($rutaTmp);
        $tipoImagen=$_FILES["Foto"]["type"];
        
        // $data= date("Y-m-d",time());
    
        $dadesImatge = mysqli_real_escape_string($conexion,$dadesImatge);
        $sql_linea= "INSERT INTO usuari(email, password, nom, cognoms, direccio, poblacio, cPostal, dadesFoto, tipusFoto, admin) VALUES('$email', '$passwFi', '$nom', '$cognoms', '$direccio', '$poblacio','$cPostal', '$dadesImatge', '$tipoImagen', 0)";
    
        // echo $sql_linea;
        
        // protegemos los caracteres de la foto
    
    
        mysqli_query($conexion, $sql_linea);
        
    
        if (mysqli_affected_rows($conexion) == 1) {
            echo "DADES INSERIDES";
            echo '<script type="text/javascript">';
            echo 'alert("Dades inserides!")';
            echo '</script>';
            header("Location: inis.php");
           
        } else {
            echo "ERROR AL FER INSERT";
          
        }
    }

?>



    <div class="container-fluid mt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Registre</span></h2>
        <div class="row px-xl-5 d-flex justify-content-center">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30 d-flex justify-content-center">
                    <!-- <div id="success"></div> -->
                    <form method="POST"  enctype="multipart/form-data"> 
                        <div class="d-flex ">
                        <input type="text" class="mx-3" name="nom" id="" placeholder="Nom" required>
                        <br>
                        <input type="text" name="cognoms" class="mx-3" id="" placeholder="Cognoms" required>
                        <br>
                        <input type="text" name="email" id="" placeholder="email" required>
                        </div>
                        <br>
                        <div class="d-flex">
                        <input type="password" class="mx-3" name="password" id="" placeholder="password" required>
                        <br>
                        <input type="text"class="mx-3"  name="direccio" id="" placeholder="direccio" required>
                        <br>
                        <input type="text" name="cPostal" id="" placeholder="Codi postal" required>
                        </div>
                        <br>
                        <div>
                        <input type="text"class="mx-3" name="poblacio" id="" placeholder="poblacio" required>
                        </div>
                        <br>
                        <input type="file" name="Foto" id="" required>
                        <br>
                        <br>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="botonReg">Registrar-se</button>
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