<?php 
include "../helpers/autorizado.php";
include "../layout/layout.php";
include '../../helpers/utilities.php';
include '../../helpers/FileHandler/IFileHandler.php';
include '../../helpers/FileHandler/JsonFileHandler.php';
include '../../database/SADVContext.php';
include 'Ciudadano.php';
include '../../database/repository/IRepository.php';
include '../../database/repository/RepositoryBase.php';
include '../../database/repository/RepositoryCiudadano.php';
include 'CiudadanoService.php';

$layout = new layout(true,"ciudadanos",true);
$utilities = new Utilities();
$service = new CiudadanoService("../../database");

$listado = $service->GetAll();
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
    <title>Ciudadanos</title>
</head>
<body  id="page-top">
<?php $layout->mostrarHeader();?>

<div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="listaElecciones.php">Ciudadanos</a>
        </li>
        <li class="breadcrumb-item active">Lista</li>
    </ol>
    <?php if (empty($listado)) : ?>

<h3>No hay ciudadano registrado, <a href="guardar.php" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> Agregar nuevo ciudadano </a> </h3>

<?php else : ?>
    <!--Tabla-->
    <div class="card mb-3">
        <div class="card-header">
        <i class="fas fa-user-cog"></i> Listado de Ciudadanos       
            <a href="guardar.php"><button type="button" style="float: right;" class="btn btn-primary" data-target="#User" onclick="newCbUser('5')">Nueva</button></a>
            <!--button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#User" onclick="newCbUser('5')">Nuevo</button-->
        </div>

        <div class="card-body">
            <div class="table-responsive" id="rUsers">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered datatable dataTable no-footer" width="100%" cellspacing="0" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Negocio: activate to sort column ascending" style="width: 80px;">Documento de Identidad</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tipo Usuario: activate to sort column ascending" style="width: 160px;">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Usuario: activate to sort column ascending" style="width: 170px;">Apellido</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 64px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Correo: activate to sort column ascending" style="width: 60px;">Estado</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column descending" style="width: 26px;" aria-sort="ascending">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php foreach ($listado as $ciudadano) : ?>
                                        <tr>
                                            <th scope="col"><?php echo $ciudadano->documentoIdentidad; ?></th>
                                            <th scope="col"><?php echo $ciudadano->nombre; ?></th>
                                            <th scope="col"><?php echo $ciudadano->apellido; ?></th>
                                            <th scope="col"><?php echo $ciudadano->email; ?></th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <?php if ($ciudadano->estado) : ?>
                                                        <input class="form-check-input form-control-lg" style="width:30px;margin-top: -24%;" disabled type="checkbox" checked id="defaultCheck1">
                                                    <?php else : ?>
                                                        <input class="form-check-input form-control-lg" style="width:30px;margin-top: -24%;" type="checkbox" id="defaultCheck1">
                                                    <?php endif; ?>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="btn-group">
                                                    <a href="editar.php?id=<?php echo $ciudadano->id; ?>" class="btn text-white btn-sm btn-outline-secondary btn-warning"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                                    <a href="eliminar.php?id=<?php echo $ciudadano->id; ?>" class="btn text-white btn-sm btn-outline-secondary btn-danger delete-button"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</a>
                                                </div>
                                            </th>

                                        </tr>

                                    <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php endif; ?>


<?php $layout->mostrarFooter();?>
</body>
<script>
 $(document).ready(function() {
          
          $(".delete-button").on("click",function(){
            if(confirm("Esta seguro que deseas borrar este ciudadano ?")){
                window.location = "delete.php?id="+$(this).data("id");
            }
          });
          //
        });

            </script>
</html>