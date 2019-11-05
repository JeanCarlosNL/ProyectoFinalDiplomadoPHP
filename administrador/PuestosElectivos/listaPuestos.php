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
    <title>Document</title>
</head>
<body>
<div class="card mb-3">
<div class="card-header">
<i class="fas fa-user-cog"></i> Listado Usuario
	
<button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#User" onclick="newCbUser('5')">Nuevo</button>

<!--button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#User" onclick="newCbUser('5')">Nuevo</button-->
</div>
<div class="card-body">
  <div class="table-responsive" id="rUsers">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered datatable dataTable no-footer" width="100%" cellspacing="0" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
        <thead>
          <tr role="row"><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Negocio: activate to sort column ascending" style="width: 64px;">Negocio</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tipo Usuario: activate to sort column ascending" style="width: 84px;">Tipo Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Usuario: activate to sort column ascending" style="width: 59px;">Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 64px;">Nombre</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Correo: activate to sort column ascending" style="width: 151px;">Correo</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Fecha Creacion: activate to sort column ascending" style="width: 67px;">Fecha Creacion</th><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column descending" style="width: 26px;" aria-sort="ascending"></th></tr></thead>
    <tbody>
    
    
    
     
  <tr role="row" class="odd">
	 <td class="">
        Financiera GPRS      </td>
      <td class="">
        Administrador      </td>
      <td class="">Jack</td>
      <td class="">Jose Emmanuel Perez</td>
      <td>jack210030@gmail.com</td>
      <td>2019-06-03</td>
      <td style="align:center" class="sorting_1">
        <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#User" onclick="openCbUser('edit', '29', 'Jose Emmanuel','Perez', 'Jack','jack210030@gmail.com','1','5')"><i class="material-icons">edit</i></button>

        <input type="hidden" value="{&quot;inicio&quot;:&quot;on&quot;,&quot;sol_prestamo&quot;:&quot;on&quot;,&quot;prestamo_personal&quot;:&quot;on&quot;,&quot;prestamo_inmobilirario&quot;:&quot;on&quot;,&quot;prestamo_vehiculo&quot;:&quot;on&quot;,&quot;historial_pago&quot;:&quot;on&quot;,&quot;historial_retiro&quot;:&quot;on&quot;,&quot;cliente&quot;:&quot;on&quot;,&quot;vehiculo&quot;:&quot;on&quot;,&quot;inmobilirario&quot;:&quot;on&quot;,&quot;caja&quot;:&quot;on&quot;,&quot;banco&quot;:&quot;on&quot;,&quot;notario&quot;:&quot;on&quot;,&quot;usuario&quot;:&quot;on&quot;,&quot;configuracion&quot;:&quot;on&quot;,&quot;cambio_mora&quot;:&quot;on&quot;,&quot;cambio_fecha_pagar&quot;:&quot;on&quot;,&quot;modificar_prestamo&quot;:&quot;on&quot;,&quot;modificar_cliente&quot;:&quot;on&quot;,&quot;eliminar_cliente&quot;:&quot;on&quot;,&quot;grafica_estadistica&quot;:&quot;on&quot;,&quot;fecha_inicio_prestamo&quot;:&quot;on&quot;,&quot;mensajero&quot;:&quot;on&quot;,&quot;ruta&quot;:&quot;on&quot;,&quot;negocio&quot;:&quot;off&quot;,&quot;ranking&quot;:&quot;on&quot;,&quot;plan&quot;:&quot;off&quot;,&quot;pago_efectivo&quot;:&quot;off&quot;,&quot;pago_tarjeta&quot;:&quot;off&quot;,&quot;reporte_estado_negocio&quot;:&quot;off&quot;,&quot;reporte_pago_servicio&quot;:&quot;off&quot;}" name="29" id="29">
        
        <button id="pass-user" name="pass-user" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#Pass-User" onclick="pass('29')"><i class="material-icons">lock</i></button>

        <button id="delete-user" name="delete-user" type="button" class="btn btn-danger btn-circle" onclick="delete_user('top','center','Jose Emmanuel Perez','29')"><i class="material-icons">delete_forever</i></button>

      </td>
    </tr><tr role="row" class="even">
	 <td class="">
        Financiera GPRS      </td>
      <td class="">
        Administrador      </td>
      <td class="">root</td>
      <td class="">Root Sistema</td>
      <td>root@gmail.com</td>
      <td>2019-11-01</td>
      <td style="align:center" class="sorting_1">
        <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#User" onclick="openCbUser('edit', '38', 'Root','Sistema', 'root','root@gmail.com','1','5')"><i class="material-icons">edit</i></button>

        <input type="hidden" value="{&quot;inicio&quot;:&quot;on&quot;,&quot;sol_prestamo&quot;:&quot;on&quot;,&quot;prestamo_personal&quot;:&quot;on&quot;,&quot;prestamo_inmobilirario&quot;:&quot;on&quot;,&quot;prestamo_vehiculo&quot;:&quot;on&quot;,&quot;historial_pago&quot;:&quot;on&quot;,&quot;historial_retiro&quot;:&quot;on&quot;,&quot;cliente&quot;:&quot;on&quot;,&quot;vehiculo&quot;:&quot;on&quot;,&quot;inmobilirario&quot;:&quot;on&quot;,&quot;caja&quot;:&quot;on&quot;,&quot;banco&quot;:&quot;on&quot;,&quot;notario&quot;:&quot;on&quot;,&quot;usuario&quot;:&quot;on&quot;,&quot;configuracion&quot;:&quot;on&quot;,&quot;cambio_mora&quot;:&quot;on&quot;,&quot;cambio_fecha_pagar&quot;:&quot;on&quot;,&quot;modificar_prestamo&quot;:&quot;on&quot;,&quot;modificar_cliente&quot;:&quot;on&quot;,&quot;eliminar_cliente&quot;:&quot;on&quot;,&quot;grafica_estadistica&quot;:&quot;on&quot;,&quot;fecha_inicio_prestamo&quot;:&quot;on&quot;,&quot;mensajero&quot;:&quot;on&quot;,&quot;ruta&quot;:&quot;on&quot;,&quot;negocio&quot;:&quot;off&quot;,&quot;ranking&quot;:&quot;on&quot;,&quot;plan&quot;:&quot;off&quot;,&quot;pago_efectivo&quot;:&quot;off&quot;,&quot;pago_tarjeta&quot;:&quot;off&quot;,&quot;reporte_estado_negocio&quot;:&quot;off&quot;,&quot;reporte_pago_servicio&quot;:&quot;off&quot;}" name="38" id="38">
        
        <button id="pass-user" name="pass-user" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#Pass-User" onclick="pass('38')"><i class="material-icons">lock</i></button>

        <button id="delete-user" name="delete-user" type="button" class="btn btn-danger btn-circle" onclick="delete_user('top','center','Root Sistema','38')"><i class="material-icons">delete_forever</i></button>

      </td>
    </tr><tr role="row" class="odd">
	 <td class="">
        Financiera GPRS      </td>
      <td class="">
        Secretaria      </td>
      <td class="">secretaria</td>
      <td class="">Secretaria Fulana</td>
      <td>secretaria@gmail.com</td>
      <td>2019-09-03</td>
      <td style="align:center" class="sorting_1">
        <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#User" onclick="openCbUser('edit', '30', 'Secretaria','Fulana', 'secretaria','secretaria@gmail.com','2','5')"><i class="material-icons">edit</i></button>

        <input type="hidden" value="{&quot;inicio&quot;:&quot;on&quot;,&quot;sol_prestamo&quot;:&quot;on&quot;,&quot;prestamo_personal&quot;:&quot;on&quot;,&quot;prestamo_inmobilirario&quot;:&quot;on&quot;,&quot;prestamo_vehiculo&quot;:&quot;on&quot;,&quot;historial_pago&quot;:&quot;on&quot;,&quot;historial_retiro&quot;:&quot;on&quot;,&quot;cliente&quot;:&quot;on&quot;,&quot;vehiculo&quot;:&quot;on&quot;,&quot;inmobilirario&quot;:&quot;on&quot;,&quot;caja&quot;:&quot;on&quot;,&quot;banco&quot;:&quot;on&quot;,&quot;notario&quot;:&quot;on&quot;,&quot;usuario&quot;:&quot;on&quot;,&quot;configuracion&quot;:&quot;on&quot;,&quot;cambio_mora&quot;:&quot;off&quot;,&quot;cambio_fecha_pagar&quot;:&quot;off&quot;,&quot;modificar_prestamo&quot;:&quot;off&quot;,&quot;modificar_cliente&quot;:&quot;off&quot;,&quot;eliminar_cliente&quot;:&quot;off&quot;,&quot;grafica_estadistica&quot;:&quot;off&quot;,&quot;fecha_inicio_prestamo&quot;:&quot;off&quot;,&quot;mensajero&quot;:&quot;off&quot;,&quot;ruta&quot;:&quot;off&quot;,&quot;negocio&quot;:&quot;off&quot;,&quot;ranking&quot;:&quot;off&quot;,&quot;plan&quot;:&quot;off&quot;,&quot;pago_efectivo&quot;:&quot;off&quot;,&quot;pago_tarjeta&quot;:&quot;off&quot;,&quot;reporte_estado_negocio&quot;:&quot;off&quot;,&quot;reporte_pago_servicio&quot;:&quot;off&quot;}" name="30" id="30">
        
        <button id="pass-user" name="pass-user" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#Pass-User" onclick="pass('30')"><i class="material-icons">lock</i></button>

        <button id="delete-user" name="delete-user" type="button" class="btn btn-danger btn-circle" onclick="delete_user('top','center','Secretaria Fulana','30')"><i class="material-icons">delete_forever</i></button>

      </td>
    </tr></tbody>
</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>
</div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../styles/vendor/jquery/jquery.min.js"></script>
  <script src="../../styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../styles/vendor/chart.js/Chart.min.js"></script>
  <script src="../../styles/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../styles/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../styles/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../styles/js/demo/datatables-demo.js"></script>
  <script src="../../styles/js/demo/chart-area-demo.js"></script>

</body>
</html>