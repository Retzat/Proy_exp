<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  $id=$_GET['id'];
  /*echo $email;
  echo "<pre>";
  var_dump($email);
  echo "</pre>";*/
  if(filter_var($id, FILTER_VALIDATE_STRING)){
    $sql = "SELECT * FROM eventos WHERE identificador = '$id'";
    $resultado = $conexion->query($sql);
    $evento_al = $resultado->fetch_assoc();
    $nombres = $evento_al['nombre_evento'];
    $horaInicio = $evento_al['hora_in'];
    $horaFinal = $evento_al['hora_fin'];
    $asesor = $evento_al['asesor'];
    $identificador = $evento_al['identificador'];
  if(filter_var($email, FILTER_VALIDATE_STRING)){
    $sql = "SELECT * FROM eventos WHERE identificador = '$id'";
    $resultado = $conexion->query($sql);
    $evento_al = $resultado->fetch_assoc();
    //echo "<pre>";
    //var_dump($docente);
    //echo "</pre>";    
    $nombres = $evento_al['nombre_evento'];
    $horaInicio = $evento_al['hora_in'];
    $horaFinal = $evento_al['hora_fin'];
    $asesor = $evento_al['asesor'];
    $identificador = $evento_al['identificador'];
  }else{
    echo '<script>alert("Error al ingresar a la pagina");window.location="pag_admin_tables_eventos.php";</script>';
  }
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
            <h1>Modificar Externos</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Modifica una credencial de una persona externa</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Docente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="modificar_externo" method="post" action="modelo_al.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombres_ex" placeholder="Nombres" onkeypress="return soloLetras(event)" value="<?php echo $nombres ?>"  requiered>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido paterno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_pat_ex" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo $ap_paterno ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido materno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_mat_ex" placeholder="Apellido materno" onkeypress="return soloLetras(event)" value="<?php echo $ap_materno ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Procedencia</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="procedencia_ex" placeholder="Procedencia"  value="<?php echo $procedencia ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Número telefónico</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tel_ex" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?php echo $telefono ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email_ex" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' title="Entre un email válido" placeholder="Correo electrónico" value="<?php echo $email_doc ?>" readonly="readonly" required>
                    </div>
                  </div>                  
                 
                  <div class="form-group">
                    <label>Participación en evento</label>
                    <select class="form-control" name="participacion_ex" name="permiso_ex" required>
                      <?php
                      if($participacion == 0){
                        echo '<option value="0" selected>Oyente</option>';
                        echo '<option value="1" >Expositor</option>';}
                      else if($participacion==1){
                        echo '<option value="0" >Oyente</option>';
                        echo '<option value="1" selected>Expositor</option>';}                  
                          ?>
                      
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="edit_ex">Modificar Externo</button>
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

  
