<?php

session_start();

if(isset($_SESSION['Administrador'])){

    if($_SESSION['Administrador'] != null){
        $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
        header("location: ../index.php");
        exit();
    }else{
        $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
        header("location: ../index.php");
        exit();
    }

}else{
    if(isset($_SESSION['Votante'])){

        if($_SESSION['Votante']==null){
            $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
            header("location: ../index.php");
            exit();
        }

    }else{
        $_SESSION['mensajeAutorizacion'] = "No tiene permizo para acceder";
        header("location: ../index.php");
        exit();
    }
    
}

?>