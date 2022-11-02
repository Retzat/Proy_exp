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
            <h1>Lista de personas acreditadas con asistencia</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de personas que acreditan certificado</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numero de control o email</th>
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Tipo</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                      try{
                        $sql = "SELECT nombres, ap_paterno, ap_materno, nc 
                        FROM alumnos,registro_alumnos_oyentes
                        WHERE alumnos.nc = registro_alumnos_oyentes.nc_reg and reg1=1 and reg2=1 and reg3=1";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($alumnos_acre = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $alumnos_acre['nc']; ?></td>
                          <td><?php echo $alumnos_acre['nombres']; ?></td>
                          <td><?php echo $alumnos_acre['ap_paterno']; ?></td>
                          <td><?php echo $alumnos_acre['ap_materno']; ?></td>
                          <td>Alumno</td>                          
                        <?php
                        }
                        try{
                          $sql = "SELECT nombres, ap_paterno, ap_materno, email_ex 
                          FROM externos,registro_externos
                          WHERE email_registro = email_ex and reg1=1 and reg2=1 and reg3=1";
                          $resultado = $conexion->query($sql);
                        }catch(Exception $e){
                          echo "Error: " . $e->getMessage();
                        }
                        while($externos_acre = $resultado->fetch_assoc()){ ?>
                          <tr>
                            <td><?php echo $externos_acre['email_ex']; ?></td>
                            <td><?php echo $externos_acre['nombres']; ?></td>
                            <td><?php echo $externos_acre['ap_paterno']; ?></td>
                            <td><?php echo $externos_acre['ap_materno']; ?></td>
                            <td>Externo</td>                          
                          <?php
                          }
                    ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Numero de control o email</th>
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Tipo</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <div class="card-header">
                <h3 class="card-title">Lista de personas que cumplieron con los 3 registros</h3>
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

  
