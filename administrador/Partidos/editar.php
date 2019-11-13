<?php 

//include '../helpers/auth.php';
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Partido.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryPartidos.php';
include 'PartidoServices.php';

$layout = new layout(true,"partidos",true);
$utilities = new Utilities();
$service = new PartidoService("../../database");

$containId = isset($_GET['id']);
$element = null;
if ($containId) {
    $id = $_GET['id'];
    $element = $service->GetById($id);
$selectedActivo=($element->estado == "1") ? "checked" : ""; 
$selectedInactivo=($element->estado == "0") ? "checked" : ""; 
}



// Validacion de POST

if(isset($_POST['nombre']) && isset($_POST['descripcion'])){

    $updateEntity = new Partido();
    $updateEntity->InitializeData($id, $_POST['nombre'], $_POST['descripcion'], $_POST['estado']);
    $service->Update($id, $updateEntity);
    header("Location: listaPartidos.php");
   exit();

}else

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
    <title>Partidos</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaPartidos.php">Partidos</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    
    <?php if ($containId && $element != null) : ?>
    <!--Formulario-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Edicion del Partido <strong><?php echo $element->nombre;?></strong>
        </div>

        <div class="card-body">

        <!-- Formulario -->

        <form class="needs-validation" method="POST" action= "editar.php?id=<?php echo $element->id; ?>" enctype="multipart/form-data" >
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <h6><label for="nombre" class="col-form-label-lg col-form-label">Nombre</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="nombre" value=" <?php echo $element->nombre;?> " placeholder="Nombre del Partido" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Digite un nombre valido
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <h6><label for="logo" class="col-form-label-lg col-form-label">Logo del Partido</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-file-image" aria-hidden="true"></i></span>
                        </div>
                        <div class="custom-file">
                            <input name="logo" type="file" class="custom-file-input" id="foto"
                            aria-describedby="inputGroupFileAddon01" >
                            <label class="custom-file-label" for="logo">Escoja una logo</label>
                        

                        </div>

                    </div>
                    <div class="col-md-6">                           
                            <img class="bd-placeholder-img card-img-top" src="<?php echo $element->logo; ?>" width="100%" height="100%" alt="">
                            </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-9 mb-3">
                    <h6><label for="descripcion" class="col-form-label-lg col-form-label">Descripcion</label></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        </div>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del partido" aria-describedby="inputGroupPrepend" requiredcols="30" rows="10" ><?php echo $element->descripcion;?></textarea>
  
                    </div>
                </div>
            </div>
            <h6><label class="col-form-label-lg col-form-label">Estado</label></h6>
            <div class="custom-control custom-radio">
            <select name="estado" class="form-control" id="CheckStatus">
            <option <?php echo $selectedActivo; ?> value="1">Activo</option>
            <option <?php echo $selectedInactivo; ?> value="0">Inactivo</option>
            </select>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Editar</button>
        </form>
        <?php else : ?>

<h2>No existe</h2>

<?php endif; ?>


<script>

</script>
        <!-- /Formulario -->



        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php $layout->mostrarFooter();?>
</body>
</html>