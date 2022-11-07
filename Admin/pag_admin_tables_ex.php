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
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Procedencia</th>
                    <th>Participacion</th>
                    <th>Email</th>                    
                    <th>Telefono</th>                    
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                      try{
                        $sql = "SELECT nombres, ap_paterno, ap_materno, procedencia, email_ex, pass, participacion, telefono FROM externos";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($externos = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $externos['nombres']; ?></td>
                          <td><?php echo $externos['ap_paterno']; ?></td>
                          <td><?php echo $externos['ap_materno']; ?></td>
                          <td><?php echo $externos['procedencia']; ?></td>
                          <?php 
                          if($externos['participacion'] == 0){
                            echo "<td>Oyente</td>";
                          }else if($externos['participacion'] == 1){
                            echo "<td>Expositor</td>";
                          }
                          ?>
                          <td><?php echo $externos['email_ex']; ?></td>
                          <td><?php echo $externos['telefono']; ?></td>                          
                          <td>
                            <a href="editar_externo.php?email=<?php echo $externos['email_ex']; ?>" class="btn bg-orange btn-flat margin"><!-- Esta clase es de fontawesome -->
                              <i class="fas fa-pencil-alt"></i>Editar
                            </a>
                            <a href="eliminar_externo.php?email=<?php echo $externos['email_ex']; ?>" data-id="<?php echo $externos['email_ex']; ?>" data-tipo="externo" class="btn bg-maroon btn-flat margin borrar_registro">
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
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Procedencia</th>
                    <th>Participacion</th>
                    <th>Email</th>                    
                    <th>Telefono</th>                    
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

  
