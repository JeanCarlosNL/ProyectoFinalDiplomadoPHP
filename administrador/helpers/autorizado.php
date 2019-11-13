<?php


session_start();
if(isset($_SESSION['Administrador'])){

    if($_SESSION['Administrador'] == null){
        $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
        header("location:inicioSesion.php");
        exit();
    }

}else{
    $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
    header("location:inicioSesion.php");
    exit();
}


?>
