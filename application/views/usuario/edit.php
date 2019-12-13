<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">

</head>
<body>   
    <div class="modal1" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDITAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<form method="POST" action="<?php echo base_url('usuario/update')?>">
    <?php foreach ($datosUsuarios as $value) { ?>
    
    <input type="hidden" name="txtUsuarioID" value="<?php echo $value->eCodUsuarios; ?>">
    
      <div class="modal-body">        
          <div class="form-group">
        <input type="text" name="nombre" class="form-control" value="<?php echo $value->tNombre; ?>">
    </div>
    
    <div class="form-group">
        <input type="text" name="correo" class="form-control" value="<?php echo $value->tCorreo; ?>">
    </div>
    
    <div class="form-group">
        <input type="date" name="nacimiento" class="form-control" value="<?php echo $value->tNacimiento; ?>">
    </div>
          
  <div class="form-group">
        <label>Estatus:</label>
            <?php 
            $lista = array();
            foreach ($selEstatus as $registro1) {
                $lista[$registro1->eCodEstatus] = $registro1->tNombre;
             } 
             
             echo form_dropdown('txtestatus', $lista, $value->eCodEstatus, 'class="form-control"');
             ?>
    </div>
    
    <div class="form-group">
        <label>Ciudad:</label>
            <?php 
            $lista = array();
            foreach ($selCiudades as $registro) {
                $lista[$registro->eCodCiudad] = $registro->tNombre;
             } 
             
             echo form_dropdown('txtciudad', $lista, $value->eCodCiudad, 'class="form-control"');
             ?>
    </div>
          
         <?php } ?>
          
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
    </div>
  </div>
</div> 
    </div>
    
    <!-- jquery -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables -->
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<!-- custom js -->
	<script type="text/javascript" src="custom/js/home.js"></script>
</body>
</html>