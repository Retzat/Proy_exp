<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';

?> 



  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de externos</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de personas externas que asistiran al evento</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Grado</th>
                    <th>Nombre(s)</th>                    
                    <th>Procedencia</th>
                    <th>Email</th>
                    <th>Tema</th>
                    <th>Curriculum</th>                                
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                      try{
                        $sql = "SELECT nombres, ap_paterno, ap_materno, procedencia, email_ex,grado, tema,descripcion FROM externos,curriculum
                        WHERE email_ex = email";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($externos = $resultado->fetch_assoc()){ ?>
                        <tr>
                        <?php 
                          if($externos['grado'] == 1){
                            echo "<td>Ingeniero/a</td>";
                          }else if($externos['grado'] == 2){
                            echo "<td>Maestro/a</td>";
                          }else if($externos['grado'] == 3){
                            echo "<td>Doctor/a</td>";
                          }
                          ?>
                          <td><?php echo $externos['nombres']." ".$externos['ap_paterno']." ".$externos['ap_materno']; ?></td>
                          <td><?php  echo $externos['procedencia']; ?></td>
                          <td><?php echo $externos['email_ex'] ; ?></td>
                          <td><?php echo $externos['tema']; ?></td>
                          <td><?php echo $externos['email_ex']; ?></td>                        
                          <td>                            
                            <a href="eliminar_inv.php?email=<?php echo $externos['email_ex']; ?>" data-id="<?php echo $externos['email_ex']; ?>" data-tipo="externo" class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fas fa-trash"></i>Eliminar
                            </a>
                          </td>
                        </tr>
                        <?php
                        }
                    ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Grado</th>
                    <th>Nombre(s)</th>                    
                    <th>Procedencia</th>
                    <th>Email</th>
                    <th>Tema</th>
                    <th>Curriculum</th>                                
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <div class="card-header">
                <h3 class="card-title">Tabla para el registro de personas externas a la institucion</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="js/confirmacion.js"></script>
<?php
  include_once 'templates/footer.php';
?>

  
