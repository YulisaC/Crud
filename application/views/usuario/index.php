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
      <div class="container">
    <div class="card" style="width:90%;margin:30px auto;"><!-- el style para darle un espacio abajo de la barra-->
        <div class="card-header" style="content-align: right">
            <div class="row">
                <div class="col-7">
                    <input name="pais" id="pais" class="form-control" placeholder="Buscar Registro"></input>
                </div>
                <div class="col-2">
                <button class="btn btn-warning" data-toggle="modal" data-target="#addMember" onclick="addMemberModel()">
                    <span class="glyphicon glyphicon-plus"/> Agregar</button>
                </div>
                
            </div>
        </div>
              
<!--Tabla de lista-->
 <div class="card-body">
        <table class="table table-bordered" id="manageMemberTable" >
            <thead >
            <!--<<th>ID</th>-->
            <th>Nombre</th>
            <th>Correo</th>
            <th>Nacimiento</th>
            <th>Estatus</th>
            <th>Resgistro</th>
            <th>Ciudad</th>
            <th>Acciones</th>
            </thead>
            
            <tbody>
                <?php foreach ($list_usuarios as $value) {?>
                <tr>
                    <!--<td><?php echo $value->eCodUsuarios;?></td>-->
                    <td><?php echo $value->tNombre;?></td>
                    <td><?php echo $value->tCorreo;?></td>
                    <td><?php echo $value->tNacimiento;?></td>
                    <td><?php echo $value->tEstatus;?></td>
                    <td><?php echo $value->fhRegistro;?></td>
                    <td><?php echo $value->tCiudad;?></td>
                    <td>
                        <a href="<?php echo base_url('usuario/del_usuario')."/".$value->eCodUsuarios; ?>"><button type="button" class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-trash"/></button></a>
                        <a href="<?php echo base_url('usuario/edit')."/".$value->eCodUsuarios; ?>"><button type="button" class="btn btn-success" data-toggle="modal1" data-target="#addMember" onclick="addMemberModel()"><span class="glyphicon glyphicon-edit"/></button></a>
                   <!--<button class="btn btn-warning" data-toggle="modal" data-target="#addMember" onclick="addMemberModel()">-->
                    </td>
                
                </tr>
                <?php } ?>
            </tbody>
        </table>
       </div>

<!-- add member -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
     <form method="POST" action="<?php echo base_url('usuario/ins_usuario')?>">
      <div class="modal-body">        
          <div class="form-group">
              <label>Ingrese su Nombre</label>
        <input type="text" name="nombre" class="form-control" required/>
    </div>
    
    <div class="form-group">
        <label>Ingrese su Correo</label>
        <input type="text" name="correo" class="form-control" required/>
    </div>
    
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="nacimiento" class="form-control" required/>
    </div>
          
    <div class="form-group">
        <label>Estatus</label>
        <select name="txtestatus">
            <?php foreach ($selEstatus as $value) { ?>
            <option id="txtestatus" value="<?php echo $value->eCodEstatus?>"><?php echo $value->tNombre;?></option>
            <?php } ?>
        </select>   
    </div>
        
    <div class="form-group">
        <label>Ciudad</label>
        <select name="txtciudad">
            <?php foreach ($selCiudades as $value) { ?>
            <option id="txtciudad" value="<?php echo $value->eCodCiudad?>"><?php echo $value->tNombre;?></option>
            <?php } ?>
        </select>   
    </div>
          
      </div>
          
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- /add mmebers -->
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

 <!-- Footer -->
     
       
</body>
</html>