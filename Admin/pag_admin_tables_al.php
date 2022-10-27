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
            <h1>Lista de Alumnos</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de estudiantes que deben asistir a Expo-Sistemas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Semestre</th>
                    <th>Número de control</th>
                    <th>Participacion</th>
                    <th>Email</th>                    
                    <th>Telefono</th>                    
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                      try{
                        $sql = "SELECT nombres, ap_paterno, ap_materno, nc, semestre, email_al, participacion, telefono FROM alumnos";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($alumnos = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $alumnos['nombres']; ?></td>
                          <td><?php echo $alumnos['ap_paterno']; ?></td>
                          <td><?php echo $alumnos['ap_materno']; ?></td>
                          <?php 
                          if($alumnos['semestre'] == 1){
                            echo "<td>Primer semestre</td>";
                          }else if($alumnos['semestre'] == 2){
                            echo "<td>Segundo semestre</td>";
                          }else if($alumnos['semestre'] == 3){
                            echo "<td>Tercer semestre</td>";
                          }else if($alumnos['semestre'] == 4){
                            echo "<td>Cuarto semestre</td>";
                          }else if($alumnos['semestre'] == 5){
                            echo "<td>Quinto semestre</td>";
                          }else if($alumnos['semestre'] == 6){
                            echo "<td>Sexto semestre</td>";
                          }else if($alumnos['semestre'] == 7){
                            echo "<td>Septimo semestre</td>";
                          }else{
                            echo "<td>Octavo semestre</td>";
                          }
                          ?>
                          <td><?php echo $alumnos['nc']; ?></td>
                          <?php 
                          if($alumnos['participacion'] == 0){
                            echo "<td>Oyente</td>";
                          }else if($alumnos['participacion'] == 1){
                            echo "<td>Expositor</td>";
                          }
                          ?>
                          <td><?php echo $alumnos['email_al']; ?></td>
                          <td><?php echo $alumnos['telefono']; ?></td>                          
                          <td>
                            <a href="editar_alumno.php?email=<?php echo $alumnos['email_al']; ?>" class="btn bg-orange btn-flat margin"><!-- Esta clase es de fontawesome -->
                              <i class="fas fa-pencil-alt"></i>Editar
                            </a>
                            <a href="#" data-id="<?php echo $alumnos['email_al']; ?>" data-tipo="alumno" class="btn bg-maroon btn-flat margin borrar_registro">
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
                    <th>Semestre</th>
                    <th>Número de control</th>
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
                <h3 class="card-title">Tabla de alumnos con opciones</h3>
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

  
