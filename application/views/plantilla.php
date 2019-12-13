<!DOCTYPE html>
<html lang="es">
    
<head>
	<meta charset="UTF-8">
	<title>Crud</title>
        <link href="<?php echo base_url('templates/css/bootstrap.css')?>" rel="stylesheet">
        <script src="<?php echo base_url('templates/js/bootstrap.js')?>"></script>
</head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
          <div class="container">
            <a class="navbar-brand" href="#">CRUD - Codeigniter, Ajax, Bootstrap</a>
          </div>
        </nav>
        
     <!-- Main component for a primary marketing message or call to action -->
      <div>
        <?php
                    $this->load->view($contenido);
        ?>
     
      </div>

        
    </body>
    
</html>