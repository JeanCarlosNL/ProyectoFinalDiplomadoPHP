<?php 

include "../helpers/autorizado.php";
include '../layout/layout.php';
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Eleccion.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryEleccion.php';
include 'EleccionService.php';

$layout = new layout(true,"elecciones",true);
$utilities = new Utilities();
$service = new EleccionService("../../database");

$listado = $service->GetAll();
if(isset($_POST['nombre']) && isset($_POST['fecha'])){
    $newEntity = new Eleccion();
    $newEntity->InitializeData(0, $_POST['nombre'], $_POST['fecha'],true);
    $service->Add($newEntity);
    header("Location: listaElecciones.php"); 
    exit(); 
}
date_default_timezone_set ( "America/Santo_Domingo" );
$date = Date('Y-m-d');

$eleccion=$service->getAll();
$contador=0;
foreach($eleccion as $activa){
    if($activa->estado==1){$contador++;}
}

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
    <title>Eleciones</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaElecciones.php">Eleciones</a>
        </li>
        <li class="breadcrumb-item active">Lista</li>
    </ol>
<?php// if (empty($listado)) : ?>

<!--<h3>No hay Elecciones registrado, <a href="guardar.php" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> Agregar nuevo eleccion</a> </h3>-->

<?php// else : ?>
    <!--Tabla-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Listado de Elecciones        
        <?php if($contador<1):?>       

            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#modal">Nueva eleccion</button>
            <?php endif;?>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="rUsers">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered datatable dataTable no-footer" width="100%" cellspacing="0" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Negocio: activate to sort column ascending" style="width: 64px;">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tipo Usuario: activate to sort column ascending" style="width: 84px;">Fecha de Realizacion</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Usuario: activate to sort column ascending" style="width: 59px;">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 64px;">Opcion</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php foreach ($listado as $eleccion) : ?>
                                        <tr>
                                            <th scope="col"><?php echo $eleccion->nombre; ?></th>
                                            <th scope="col"><?php echo $eleccion->fechaRealizada; ?></th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <?php if ($eleccion->estado) : ?>
                                                        <input class="form-check-input form-control-lg" style="width:30px;margin-top: -3%;" disabled type="checkbox" checked id="defaultCheck1">
                                                    <?php else : ?>
                                                        <input class="form-check-input form-control-lg" style="width:30px;margin-top: -3%;" type="checkbox" id="defaultCheck1">
                                                    <?php endif; ?>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="btn-group">
                                                    <a href="resultados.php?id=<?php echo $eleccion->id; ?>" class="btn text-white btn-sm btn-outline-secondary btn-warning"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ver Resultados</a>
                                                    <a href="terminar.php?id=<?php echo $eleccion->id ?>" class="btn text-white btn-sm btn-outline-secondary btn-danger delete-button"><i class="fa fa-trash-o" aria-hidden="true"></i> Terminar</a>
                                                </div>
                                            </th>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //endif; ?>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Elecion</h5>
      </div>
      <div class="modal-body">

      <form class="needs-validation" method="POST" action= "listaElecciones.php" enctype="multipart/form-data" novalidate>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre de la eleccion</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la eleccion" aria-describedby="inputGroupPrepend" required>
          </div>

          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Fecha de la eleccion</label>
            <input type="date" name ="fecha" class="form-control" value="<?= $date ?>" readonly id="recipient-name">
          </div>
        <button class="btn btn-primary" type="submit">Guardar</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->

<?php $layout->mostrarFooter();?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>