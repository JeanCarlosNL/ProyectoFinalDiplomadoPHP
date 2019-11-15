<?php 

include "../helpers/autorizado.php";
include "../layout/layout.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Candidato.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCandidato.php';
include '../../database/repository/RepositoryPartidos.php';
include '../../database/repository/RepositoryPuestosE.php';
include 'CandidatoService.php';
include '../Partidos/Partido.php';
include '../Partidos/PartidoServices.php';
include '../PuestosElectivos/PuestosElectivos.php';
include '../PuestosElectivos/PuestosService.php';

$layout = new layout(true,"candidatos",true);
$utilities = new Utilities();
$service = new CandidatoService("../../database");
$partidoService = new PartidoService("../../database");
$puestoEService = new PuestoElectivoService("../../database");
$listadoPartido = $partidoService->GetAll();
$listadoPuesto = $puestoEService->GetAll();
$listadoCandidato = $service->GetAll(); 

// Validacion de POST
$containId = isset($_GET['id']);
$element = null;
if ($containId) {
    $id = $_GET['id'];
    $element = $service->GetById($id);
    $elementPartido = $partidoService->GetById($element->idPartido);
    $elementPuestoE = $puestoEService->GetById($element->idPuesto);
    $selectedActivo=($element->estado == "1") ? "selected" : ""; 
    $selectedInactivo=($element->estado == "0") ? "selected" : ""; 
}

echo $element->nombre;
echo $element->apellido;

// Validacion de POST

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['nombrePartido']) && isset($_POST['nombrePuesto'])){
    
    foreach($listadoCandidato as $candidato){
        if($candidato->nombre != $element->nombre){
            $nombres[] = $candidato->nombre;
        }
        if($candidato->apellido != $element->apellido){
            $apellidos[]=$candidato->apellido;
        }
    }
    foreach($nombres as $nombre){
        foreach($apellidos as $apellido){
         if($_POST['nombre']==$nombre && $_POST['apellido']==$apellido){
             $_SESSION['mensajeExiste']="El candidato ya existe";
             header("location:editar.php");
             exit();
         }
     }
 }
 
 $updateEntity = new Candidato();
 $updateEntity->InitializeData($id, $_POST['nombre'], $_POST['apellido'],$_POST['nombrePartido'],$_POST['nombrePuesto'],true);
 $service->Update($updateEntity);
 header("Location: listaCandidatos.php"); 
 exit(); 
}

$mensaje="";
if(isset($_SESSION['mensajeExiste'])){
   $mensaje = $_SESSION['mensajeExiste'];
}
$_SESSION['mensajeExiste']="";


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Custom fonts for this template-->
    <link href="../../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../styles/css/sb-admin.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidatos</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaCandidatos.php">Candidatos</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    
    <!--Formulario-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Edicion del Candidato <strong><?php echo $element->nombre;?></strong>   
        </div>

        <div class="card-body">

        <!-- Formulario -->
        <?php if($mensaje!=""){echo "<script type='text/javascript'>alert('$mensaje');</script>";}?>

        <form class="needs-validation" method="POST" action= "editar.php?id=<?php echo $element->id; ?>" enctype="multipart/form-data" novalidate>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <h6><label for="nombre" class="col-form-label-lg col-form-label">Nombre</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input value="<?php echo $element->nombre;?>" type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del candidato" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un nombre valido
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <h6><label for="apellido" class="col-form-label-lg col-form-label">Apellido</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-male" aria-hidden="true"></i></span>
                        </div>
                        <input value="<?php echo $element->apellido;?>" type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido del candidato" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un apellido valido
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
            <div class="col-md-3 mb-3">
            <h6><label for="Email" class="col-form-label-lg col-form-label">Partido</label></h6>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-users" aria-hidden="true"></i></span>
                    </div>
                    <select name="nombrePartido" class="custom-select" required>
                    <option name="nombrePartido" value="">Partido al que pertenece</option>
                        <?php foreach ($listadoPartido as $partido) : ?>
                        <?php if($element->idPartido == $partido->id):?>
                            <option selected name="nombrePartido" value="<?php echo $partido->id;?>"><?php echo $partido->nombre;?></option>
                            <?php else :?>
                            <option name="nombrePartido" value="<?php echo $partido->id;?>"><?php echo $partido->nombre;?></option>
                            <?php endif?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Selecione el partido politico del aspirante</div>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <h6><label for="Email" class="col-form-label-lg col-form-label">Puesto</label></h6>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                    </div>
                    <select name="nombrePuesto" class="custom-select" required>
                        <option name="nombrePuesto" value="">Puesto al que aspira</option>
                        <?php foreach ($listadoPuesto as $puestos) : ?>
                        <?php if($element->idPuesto == $puestos->id):?>
                            <option selected name="nombrePuesto" value="<?php echo $puestos->id;?>"><?php echo $puestos->nombre;?></option>
                            <?php else :?>
                            <option name="nombrePuesto" value="<?php echo $puestos->id;?>"><?php echo $puestos->nombre;?></option>
                            <?php endif?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione el puesto al que aspira el candidato</div>
                </div>
                </div>

                <div class="col-md-4 mb-3">
                <h6><label for="foto" class="col-form-label-lg col-form-label">Foto del candidato</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-file-image" aria-hidden="true"></i></span>
                        </div>
                        <div class="custom-file">
                        <input name="foto" type="file" class="custom-file-input" id="foto"
                            aria-describedby="inputGroupFileAddon01" >
                            <label class="custom-file-label" for="foto"></label>
                        </div>
                    </div>
                    <div class="col-md-6">                           
                            <img class="bd-placeholder-img card-img-top" src="<?php echo $element->foto; ?>" width="100%" height="100%" alt="">
                            </div>
                </div>
            </div>
            <h6><label class="col-form-label-lg col-form-label">Estado</label></h6>
            <select name="estado" class="form-control" id="CheckStatus">
            <option <?php echo $selectedActivo; ?> value="1">Activo</option>
            <option <?php echo $selectedInactivo; ?> value="0">Inactivo</option>
            </select>
            <br>
            <button class="btn btn-primary" type="submit">Editar</button>
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
        <!-- /Formulario -->



        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php $layout->mostrarFooter();?>
</body>
</html>