<?php


session_start();
if(isset($_SESSION['Administrador'])){

    if($_SESSION['Administrador'] == null){
        $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
        header("location: {$layout->directory}inicioSesion.php");
        exit();
    }

}else{
    $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
    header("location: {$layout->directory}inicioSesion.php");
    exit();
}


?>