<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  $email=$_GET['email'];
  /*echo $email;
  echo "<pre>";
  var_dump($email);
  echo "</pre>";*/
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $sql = "SELECT * FROM docente WHERE email_doc = '$email'";
    $resultado = $conexion->query($sql);
    $docente = $resultado->fetch_assoc();
    //echo "<pre>";
    //var_dump($docente);
    //echo "</pre>";    
    $nombres = $docente['nombres'];
    $ap_paterno = $docente['ap_paterno'];
    $ap_materno = $docente['ap_materno'];
    $puesto = $docente['puesto'];
    $rfc = $docente['rfc'];
    $grado = $docente['grado'];
    $email_doc = $docente['email_doc'];
    $telefono = $docente['telefono'];
    $permiso = $docente['permiso'];
  }else{
    echo '<script>alert("Error al ingresar a la pagina");window.location="pag_admin_tables.php";</script>';
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
            <h1>Modificar administrador</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Modifica una credencial de administrador existente</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Docente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="editar-admin" method="post" action="modelo_adm.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombres_do" placeholder="Nombres" onkeypress="return soloLetras(event)" value="<?php echo $nombres ?>"  requiered>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido paterno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_pat_do" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo $ap_paterno ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido materno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_mat_do" placeholder="Apellido materno" onkeypress="return soloLetras(event)" value="<?php echo $ap_materno ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">RFC</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="rfc_do" placeholder="RFC" onkeypress="return check(event)" readonly minlength="13" maxlength="13" value="<?php echo $rfc ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Número telefónico</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tel_do" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?php echo $telefono ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email_do" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' title="Entre un email válido" placeholder="Correo electrónico" value="<?php echo $email_doc ?>" readonly="readonly" required>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label>Grado</label>
                    <select class="form-control" name="grado" name="grado_do" placeholder="Grado" required>
                      <?php
                      if($grado == 1){
                        echo '<option value="1" selected>Ingeniero/a</option>';
                        echo '<option value="2" >Maestro/a</option>';
                        echo '<option value="3" >Doctor/a</option>';}
                      else if($grado==2){
                        echo '<option value="1" >Ingeniero/a</option>';
                        echo '<option value="2" selected>Maestro/a</option>';
                        echo '<option value="3" >Doctor/a</option>';}
                      else if($grado==3){
                        echo '<option value="1" >Ingeniero/a</option>';
                        echo '<option value="2" >Maestro/a</option>';
                        echo '<option value="3" selected>Doctor/a</option>';}                        
                          ?>
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Selecciona puesto de academia</label>
                    <select class="form-control" name="puesto" name="puesto_do" placeholder="puesto" required>
                      <?php
                      if($puesto == 1){
                        echo '<option value="1" selected>Coordinador del programa general</option>';
                        echo '<option value="2" >Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" >Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" >Coordinador de registro de participantes</option>';
                        echo '<option value="5" >Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" >Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" >No pertenece a la academia</option>';}
                      else if($puesto==2){
                        echo '<option value="1" >Coordinador del programa general</option>';
                        echo '<option value="2" selected>Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" >Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" >Coordinador de registro de participantes</option>';
                        echo '<option value="5" >Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" >Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" >No pertenece a la academia</option>';}
                      else if($puesto==3){
                        echo '<option value="1" >Coordinador del programa general</option>';
                        echo '<option value="2" >Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" selected>Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" >Coordinador de registro de participantes</option>';
                        echo '<option value="5" >Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" >Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" >No pertenece a la academia</option>';}
                      else if($puesto==4){
                        echo '<option value="1" >Coordinador del programa general</option>';
                        echo '<option value="2" >Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" >Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" selected>Coordinador de registro de participantes</option>';
                        echo '<option value="5" >Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" >Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" >No pertenece a la academia</option>';}
                      else if($puesto==5){
                        echo '<option value="1" >Coordinador del programa general</option>';
                        echo '<option value="2" >Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" >Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" >Coordinador de registro de participantes</option>';
                        echo '<option value="5" selected>Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" >Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" >No pertenece a la academia</option>';} 
                      else if($puesto==6){
                        echo '<option value="1" >Coordinador del programa general</option>';
                        echo '<option value="2" >Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" >Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" >Coordinador de registro de participantes</option>';
                        echo '<option value="5" >Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" selected>Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" >No pertenece a la academia</option>';}
                      else if($puesto==7){
                        echo '<option value="1" >Coordinador del programa general</option>';
                        echo '<option value="2" >Coordinador de seguimiento y logística/a</option>';
                        echo '<option value="3" >Coordinador de atención a conferencistas</option>';
                        echo '<option value="4" >Coordinador de registro de participantes</option>';
                        echo '<option value="5" >Coordinador de presentación de proyectos</option>';
                        echo '<option value="6" >Coordinador de contacto a conferencistas</option>';
                        echo '<option value="7" selected>No pertenece a la academia</option>';}                        
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Grado</label>
                    <select class="form-control" name="permiso" name="permiso_do" required>
                      <?php
                      if($permiso == 1){
                        echo '<option value="1" selected>Permitido</option>';
                        echo '<option value="0" >En espera</option>';}
                      else if($permiso==0){
                        echo '<option value="1" >Permitido</option>';
                        echo '<option value="0" selected>En espera</option>';}                  
                          ?>
                      
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="edit_adm">Modificar administrador</button>
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

  
