<?php

session_start();
if(isset($_SESSION['Administrador'])){
    if($_SESSION['Administrador'] != null){
        header("location:dashboard.php");
        exit;
 }
}


if(isset($_POST['nombre']) && isset($_POST['contrasena'])){
    if($_POST['nombre']==123&&$_POST['contrasena']==123){
       $_SESSION['Administrador'] = "Soy admin";
    header("location:dashboard.php");
    exit; 
    }else{
        {echo "<script type='text/javascript'>alert('Ingrese datos correctamente.');</script>";}
    }
    

}
$mensaje="";
if(isset($_SESSION["mensajeAutorizacion"])){
    $mensaje= $_SESSION['mensajeAutorizacion'];
}
$_SESSION['mensajeAutorizacion'] ="";

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Bootstrap core CSS -->
    <link href="styles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/css/scrolling-nav.css" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="../styles/loginStyles.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php if($mensaje=="No tiene permizo para acceder"){echo "<script type='text/javascript'>alert('No tiene permitido acceder');</script>";}?>


     <!-- Barra de Navegacion-->   
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><i class="fa fa-id-card" aria-hidden="true"></i>  Sistema de Votacion/Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../index.php">Salir</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <!-- Formulario -->

    <div id="login">
<br><br>
        <h3 class="text-center text-white pt-5">Formulario de inicio de Sesion</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form needs-validation" novalidate action="inicioSesion.php" method="POST">
                            <h3 class="text-center text-info">Inicio</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nombre de Usuario:</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                                <div class="invalid-feedback">
                                    Digite su nombre de usuario
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="text" name="contrasena" id="contrasena" class="form-control" required>
                                <div class="invalid-feedback">
                                    Digite su contraseña
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Ingresar">
                            </div>
                        </form>
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                                });
                            }, false);
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>