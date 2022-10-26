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
            <h1>Lista de docentes</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de personas consideradas administrador</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Puesto</th>
                    <th>RFC</th>
                    <th>Grado</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                      try{
                        $sql = "SELECT nombres, ap_paterno, ap_materno, puesto, rfc, grado, email_doc, telefono, permiso FROM docente";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($docente = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $docente['nombres']; ?></td>
                          <td><?php echo $docente['ap_paterno']; ?></td>
                          <td><?php echo $docente['ap_materno']; ?></td>
                          <?php 
                          if($docente['puesto'] == 1){
                            echo "<td>Coordinador del programa general</td>";
                          }else if($docente['puesto'] == 2){
                            echo "<td>Coordinador de seguimiento y logística</td>";
                          }else if($docente['puesto'] == 3){
                            echo "<td>Coordinador de atención a conferencistas</td>";
                          }else if($docente['puesto'] == 4){
                            echo "<td>Coordinador de registro de participantes</td>";
                          }else if($docente['puesto'] == 5){
                            echo "<td>Coordinador de presentación de proyectos</td>";
                          }else if($docente['puesto'] == 6){
                            echo "<td>Coordinador de contacto a conferencistas</td>";
                          }else if($docente['puesto'] == 7){
                            echo "<td>No pertenece a la academia</td>";
                          }
                          ?>
                          <td><?php echo $docente['rfc']; ?></td>
                          <?php 
                          if($docente['grado'] == 1){
                            echo "<td>Ingeniero/a</td>";
                          }else if($docente['grado'] == 2){
                            echo "<td>Maestro/a</td>";
                          }else if($docente['grado'] == 3){
                            echo "<td>Doctor/a</td>";
                          }
                          ?>
                          <td><?php echo $docente['email_doc']; ?></td>
                          <td><?php echo $docente['telefono']; ?></td>
                          <?php 
                          if ($docente['permiso'] == 1) {
                            echo "<td>Administrador</td>";
                          }else{
                            echo "<td>Pendiente</td>";
                          } 
                          ?>
                          <td>
                            <a href="editar_docente.php?email=<?php echo $docente['email_doc']; ?>" class="btn bg-orange btn-flat margin"><!-- Esta clase es de fontawesome -->
                              <i class="fas fa-pencil-alt"></i>Editar
                            </a>
                            <a href="#" data-id="<?php echo $docente['email_doc']; ?>" data-tipo="docente" class="btn bg-maroon btn-flat margin borrar_registro">
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
                    <th>Puesto</th>
                    <th>RFC</th>
                    <th>Grado</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <div class="card-header">
                <h3 class="card-title">Lista de docentes que tienen permiso para entrar a administración</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  include_once 'templates/footer.php';
?>

  
