<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';

?> 



  

  <!--Aqui se contienen las tablas de eventos -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Programa</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aqui puedes ver el programa, puede ser necesario ordenar por horario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>                    
                    <th>Evento</th>
                    <th>Asesor</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Participantes</th>                 
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      try{
                        $sql = "SELECT identificador, nombre_pon, email, hora_in, hora_fin, nombres, ap_paterno, ap_materno 
                        FROM eventos_externos,externos 
                        WHERE eventos_externos.email = externos.email_ex";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($externos = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $externos['nombre_pon']; ?></td>
                          <td>Persona externa</td>
                          <td><?php echo $externos['hora_in']; ?></td>
                          <td><?php echo $externos['hora_fin']; ?></td>
                          <td><?php
                              echo $externos['nombres'] . " " . $externos['ap_paterno'] . " " . $externos['ap_materno'];
                          ?>
                          </td>                                                
                          
                        </tr>
                        <?php
                        }
                        ?>
                  <?php
                      try{
                        $sql = "SELECT identificador, nombre_evento, asesor, hora_in, hora_fin,docente.nombres, docente.ap_paterno, docente.ap_materno 
                        FROM eventos,docente 
                        WHERE eventos.asesor = docente.rfc";
                        $resultado = $conexion->query($sql);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($even_alumnos = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $even_alumnos['nombre_evento']; ?></td>
                          <td><?php                            
                              echo $even_alumnos['nombres'] . " " . $even_alumnos['ap_paterno'] . " " . $even_alumnos['ap_materno'];
                            
                          ?>
                          </td>
                          <td><?php echo $even_alumnos['hora_in']; ?></td>
                          <td><?php echo $even_alumnos['hora_fin']; ?></td>
                          <td><?php
                            /*try{
                              $sql_parti = "SELECT nombres, ap_paterno, ap_materno, eventos_participantes.nc FROM eventos_participantes,alumnos WHERE eventos_participantes.nc=alumnos.nc and id_evento = '" . $even_alumnos['identificador'] . "'";
                              $resultado = $conexion->query($sql_parti);
                            }catch(Exception $e){
                              echo "Error: " . $e->getMessage();
                            }
                            while($participantes = $resultado->fetch_assoc()){
                              echo $participantes['nombres'] . " " . $participantes['ap_paterno'] . " " . $participantes['ap_materno']."<br>";
                              
                            }*/
                          ?>
                          </td>                                             
                         
                        </tr>
                        <?php
                        }
                        ?>                        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Evento</th>
                    <th>Asesor</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Participantes</th> 
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <div class="card-header">
                <h3 class="card-title">Tabla de eventos  con opciones</h3>
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

  
