<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
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
          <h3 class="card-title">Crear presentación de una persona externa</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Crear evento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="editar-evento_ex" method="post" action="modelo_evento.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Identificador del evento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cid_even_ex" placeholder="Identificador">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre evento</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cnom_even_ex" placeholder="Nombre del evento" onkeypress="return soloLetras(event)" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hora inicio</label>
                    <div class="col-sm-2">
                      <input type="time" class="form-control" name="chora_in_ex" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hora final</label>
                    <div class="col-sm-2">
                    <input type="time" class="form-control" name="chora_fin_ex" required>
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label>Ponente</label>
                    <select class="form-control" name="cparticipante_even_ex" placeholder="Ponente" required>
                      <?php
                      try{
                        $sql_al = "SELECT email_ex, nombres, ap_paterno, ap_materno FROM externos where participacion=1 and NOT EXISTS 
                        (SELECT NULL FROM eventos_externos 
                        WHERE email = email_ex)";
                        $resultado = $conexion->query($sql_al);
                      }catch(Exception $e){
                        echo "Error: " . $e->getMessage();
                      }
                      while($externos_ponenetes = $resultado->fetch_assoc()){
                        if ($externos_ponenetes['email_ex'] == $email) { ?>
                          <option value="<?php echo $externos_ponenetes['email_ex']; ?>" selected>
                            <?php echo $externos_ponenetes['nombres'] . " " . $externos_ponenetes['ap_paterno'] . " " . $externos_ponenetes['ap_materno']; ?>
                          </option>
                          <?php
                          }else{
                          echo "<option value='" . $externos_ponenetes['email_ex'] . "'>" . $externos_ponenetes['nombres'] . " " . $externos_ponenetes['ap_paterno'] . " " . $externos_ponenetes['ap_materno'] . "</option>";
                          }}
                      
                      ?>
                  
                    </select>
                  </div>
                  <?php
                  //echo $evento_al['identificador']
                  ?>

                </div>
                <!-- /.card-body -->
                <input type="hidden" name="Datos_lista_derecha" value="null" id="setState">
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="crear_evex">Crear evento</button>
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

  
