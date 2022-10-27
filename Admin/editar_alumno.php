<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  $email=$_GET['email'];
  /*echo $email;
  echo "<pre>";
  var_dump($email);
  echo "</pre>";*/
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $sql = "SELECT * FROM alumnos WHERE email_al = '$email'";
    $resultado = $conexion->query($sql);
    $alumno = $resultado->fetch_assoc();
    //echo "<pre>";
    //var_dump($docente);
    //echo "</pre>";    
    $nombres = $alumno['nombres'];
    $ap_paterno = $alumno['ap_paterno'];
    $ap_materno = $alumno['ap_materno'];
    $nc = $alumno['nc'];
    $semestre = $alumno['semestre'];
    $email_doc = $alumno['email_al'];
    $telefono = $alumno['telefono'];
    $participacion = $alumno['participacion'];
  }else{
    echo '<script>alert("Error al ingresar a la pagina");window.location="pag_admin_tables_al.php";</script>';
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
            <h1>Modificar alumno</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Modifica una credencial de alumno existente</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Alumno</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="editar_al" method="post" action="modelo_al.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombres_al" placeholder="Nombres" onkeypress="return soloLetras(event)" value="<?php echo $nombres ?>"  requiered>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido paterno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_pat_al" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo $ap_paterno ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido materno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_mat_al" placeholder="Apellido materno" onkeypress="return soloLetras(event)" value="<?php echo $ap_materno ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Número de control</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="num_control_al" placeholder="Número de control" onkeypress="return check(event)" minlength="13" maxlength="13" value="<?php echo $nc ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Número telefónico</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tel_al" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?php echo $telefono ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email_al" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' title="Entre un email válido" placeholder="Correo electrónico" value="<?php echo $email_doc ?>" readonly="readonly" required>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label>Selecciona Semestre</label>
                    <select class="form-control" name="semestre_al" placeholder="puesto" required>
                      <?php
                      if($semestre == 1){
                        echo '<option value="1" selected>Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';}
                      else if($semestre==2){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" selected>Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';}
                      else if($semestre==3){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" selected>Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';}
                      else if($semestre==4){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" selected>Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';}
                      else if($semestre==5){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" selected>Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';} 
                      else if($semestre==6){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" selected>Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';}
                      else if($semestre==7){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" selected>Septimo semestre</option>';
                        echo '<option value="8" >Octavo semestre</option>';}
                      else if($semestre==7){
                        echo '<option value="1" >Primer semestre</option>';
                        echo '<option value="2" >Segundo semestre</option>';
                        echo '<option value="3" >Tercer semestre</option>';
                        echo '<option value="4" >Cuarto semestre</option>';
                        echo '<option value="5" >Quinto semestre</option>';
                        echo '<option value="6" >Sexto semestre</option>';
                        echo '<option value="7" >Septimo semestre</option>';
                        echo '<option value="8" selected>Octavo semestre</option>';}                         
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Participación en evento</label>
                    <select class="form-control" name="participacion_al" name="permiso_al" required>
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
                  <button type="submit" class="btn btn-info" name="edit_al">Modificar administrador</button>
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

  
