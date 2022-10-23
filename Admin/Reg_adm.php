<?php
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
            <h1>Crear administrador</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crea una nueva credencial de administrador</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Nuevo docente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="registro_docentes_adm.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombres_do" placeholder="Nombres" onkeypress="return soloLetras(event)"  requiered>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido paterno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_pat_do" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido materno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ap_mat_do" placeholder="Apellido materno" onkeypress="return soloLetras(event)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">RFC</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="rfc_do" placeholder="RFC" onkeypress="return check(event)" minlength="13" maxlength="13" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Número telefónico</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tel_do" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email_do" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' title="Entre un email válido" placeholder="Correo electrónico" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="pass1_do" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmar Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="pass2_do" placeholder="Confirmar contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Grado</label>
                    <select class="form-control" name="grado" name="grado_do" placeholder="Grado" required>
                      <option value="">Elige una opción</option>
                      <option value="1">Ingeniero/a</option>
                      <option value="2">Maestro/a</option>
                      <option value="3">Doctor/a</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Selecciona puesto de academia</label>
                    <select class="form-control" name="puesto" name="puesto_do" placeholder="puesto" required>
                      <option value="">Elige una opción</option>
                      <option value="1">Coordinador del programa general</option>
                      <option value="2">Coordinador de seguimiento y logística</option>
                      <option value="3">Coordinador de atención a conferencistas</option>
                      <option value="4">Coordinador de registro de participantes</option>
                      <option value="5">Coordinador de presentación de proyectos</option>
                      <option value="6">Coordinador de contacto a conferencistas</option>
                      <option value="7">No pertenece a la academia</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="add_adm">Crear nuevo administrador</button>
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

  
