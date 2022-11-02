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
            <h1>Lista de eventos en este programa</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aqui podras editar o borrar ponencias que se haran en Expo-Sistemas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Identificador</th>
                    <th>Evento</th>
                    <th>Asesor</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Participantes</th>
                    <th>Acciones</th>                    
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
                          <td><?php echo $externos['identificador']; ?></td>
                          <td><?php echo $externos['nombre_pon']; ?></td>
                          <td>Persona externa</td>
                          <td><?php echo $externos['hora_in']; ?></td>
                          <td><?php echo $externos['hora_fin']; ?></td>
                          <td><?php
                              echo $externos['nombres'] . " " . $externos['ap_paterno'] . " " . $externos['ap_materno'];
                          ?>
                          </td>                                                 
                          <td>
                            <a href="editar_evento_ex.php?id=<?php echo $externos['identificador']; ?>" class="btn bg-orange btn-flat margin"><!-- Esta clase es de fontawesome -->
                              <i class="fas fa-pencil-alt"></i>Editar
                            </a>
                            <a href="#" data-id="<?php echo $externos['identificador']; ?>" data-tipo="externo" class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fas fa-trash"></i>Eliminar
                            </a>
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
                          <td><?php echo $even_alumnos['identificador']; ?></td>
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
                          <td>
                            <a href="editar_evento_al.php?id=<?php echo $even_alumnos['identificador']; ?>" class="btn bg-orange btn-flat margin"><!-- Esta clase es de fontawesome -->
                              <i class="fas fa-pencil-alt"></i>Editar
                            </a>
                            <a href="#" data-id="<?php echo $externos['identificador']; ?>" data-tipo="externo" class="btn bg-maroon btn-flat margin borrar_registro">
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
                     <th>Identificador</th>
                    <th>Evento</th>
                    <th>Asesor</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Participantes</th>
                    <th>Acciones</th>   
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

<?php
  include_once 'templates/footer.php';
?>

  
