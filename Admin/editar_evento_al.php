<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  
  $id=$_GET['id'];
  $sql = "SELECT * FROM eventos WHERE identificador = '$id'";
  $resultado = $conexion->query($sql);
  $evento_al = $resultado->fetch_assoc();
  $nombre_even = $evento_al['nombre_evento'];
  $horaInicio = $evento_al['hora_in'];
  $horaFinal = $evento_al['hora_fin'];
  $asesor = $evento_al['asesor'];
  $identificador = $evento_al['identificador'];

  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';

?> 
  <script>
    function soloLetras(e) {
      var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;
  
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }
  
      if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
      }
    }
  </script>


  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear un nuevo evento</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar presentación de un estudiante</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar evento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="editar-evento_al" method="post" action="modelo_evento.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Identificador del evento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id_even_al" value="<?php echo $identificador ?>" placeholder="Identificador" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre evento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nom_even_al" placeholder="Nombre del evento" value="<?php echo $nombre_even ?>" onkeypress="return soloLetras(event)" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hora inicio</label>
                    <div class="col-sm-2">
                      <input type="time" class="form-control" name="hora_in_al" value="<?php echo $horaInicio ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hora final</label>
                    <div class="col-sm-2">
                    <input type="time" class="form-control" name="hora_fin_al" value="<?php echo $horaFinal ?>" required>
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label>Asesor</label>
                    <select class="form-control" name="asesor_even_al" placeholder="Asesor" required>
                      <?php
                      try{
                        $sql_al = "SELECT rfc, nombres, ap_paterno, ap_materno FROM docente where permiso=1";
                        $resultado = $conexion->query($sql_al);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($docentes = $resultado->fetch_assoc()){
                        if ($docentes['rfc'] == $asesor) { ?>
                          <option value="<?php echo $docentes['rfc']; ?>" selected>
                            <?php echo $docentes['nombres'] . " " . $docentes['ap_paterno'] . " " . $docentes['ap_materno']; ?>
                          </option>
                          <?php
                          }else{
                          echo "<option value='" . $docentes['rfc'] . "'>" . $docentes['nombres'] . " " . $docentes['ap_paterno'] . " " . $docentes['ap_materno'] . "</option>";
                          }}
                      
                      ?>
                  
                    </select>
                  </div>
                  <?php
                  //echo $evento_al['identificador']
                  ?>
                  <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Alumnos participantes</label>
                  <select class="duallistbox" name="lista_part_al[]" multiple="multiple">
                    <?php
                        try{
                          $sql_expositor_al = "SELECT nombres, ap_paterno, ap_materno, eventos_participantes.nc 
                          FROM eventos_participantes,alumnos 
                          WHERE eventos_participantes.nc=alumnos.nc and id_evento = '" . $evento_al['identificador'] . "'";
                          $resultado_exal = $conexion->query($sql_expositor_al);
                        }catch(Exception $e){
                          echo "Error: " . $e->getMessage();
                        }
                        while($alumnos_participantes = $resultado_exal->fetch_assoc()){?>
                          <option value="<?php echo $alumnos_participantes['nc']; ?>" selected>
                            <?php echo $alumnos_participantes['nombres'] . " " . $alumnos_participantes['ap_paterno'] . " " . $alumnos_participantes['ap_materno']; ?>
                          </option>
                          <?php
                        }
                        try{
                          $sql_expositor_al = "SELECT nombres,ap_paterno,ap_materno,nc 
                          FROM alumnos WHERE participacion=1 and NOT EXISTS 
                          (SELECT NULL FROM eventos_participantes 
                          WHERE alumnos.nc = eventos_participantes.nc 
                          AND id_evento = '" . $evento_al['identificador'] . "')";
                          $resultado_exal = $conexion->query($sql_expositor_al);
                        }catch(Exception $e){
                          echo "Error: " . $e->getMessage();
                        }
                        while($alumnos_expositores = $resultado_exal->fetch_assoc()){?>
                          <option value="<?php echo $alumnos_expositores['nc']; ?>">
                            <?php echo $alumnos_expositores['nombres'] . " " . $alumnos_expositores['ap_paterno'] . " " . $alumnos_expositores['ap_materno']; ?>
                          </option>
                          <?php
                        }  

                          ?>

                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="Datos_lista_derecha" value="null" id="setState">
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="edit_eval">Editar evento</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
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

  
