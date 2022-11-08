<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
  $sql = "SELECT * FROM datos_constancias WHERE id = 1";
  $resultado = $conexion->query($sql);
  $director = $resultado->fetch_assoc();
  //echo "<pre>";
  //var_dump($docente);
  //echo "</pre>";
  $id=$director['id'];    
  $nom_dir = $director['nombre_completo'];
  $date_con = $director['Fecha'];
  $grado_dir = $director['grado'];
  $anio_dir = $director['anio'];
  
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
            <h1>Registro datos de constancias</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crea o modifica los datos de las contancias</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Registro de datos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="crear-dato-cer" method="post" action="edita_const.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre completo director</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombres_dir" value="<?php echo $nom_dir ?>" placeholder="Nombre del director en turno ej: 'Fermín Parra Luna'" maxlength="100" onkeypress="return soloLetras(event)"  required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Grado</label>
                    <select class="form-control" name="grado_dir" placeholder="Grado" required>                      
                      <option value="">Seleccione una opción</option>
                      <?php
                      if($grado_dir == 1){
                        echo '<option value="0">Licenciado/a</option>';
                        echo '<option value="1" selected>Ingeniero/a</option>';
                        echo '<option value="2" >Maestro/a</option>';
                        echo '<option value="3" >Doctor/a</option>';}
                      else if($grado_dir==0){
                        echo '<option value="0" selected>Licenciado/a</option>';
                        echo '<option value="1" >Ingeniero/a</option>';
                        echo '<option value="2" >Maestro/a</option>';
                        echo '<option value="3" >Doctor/a</option>';}
                      else if($grado_dir==2){
                        echo '<option value="0">Licenciado/a</option>';
                        echo '<option value="1" >Ingeniero/a</option>';
                        echo '<option value="2" selected>Maestro/a</option>';
                        echo '<option value="3" >Doctor/a</option>';}
                      else if($grado_dir==3){
                        echo '<option value="0">Licenciado/a</option>';
                        echo '<option value="1" >Ingeniero/a</option>';
                        echo '<option value="2" >Maestro/a</option>';
                        echo '<option value="3" selected>Doctor/a</option>';}                        
                          ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Expo-sistemas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $date_con ?>" name="fecha_dir" placeholder="Año en curso ej: '19 de noviembre'" maxlength="50"  required>
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Año de Expo-sistemas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="anio_dir" value="<?php echo $anio_dir ?>" placeholder="Año en curso ej: '2022'" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="4"  required>
                    </div>
                  </div>                                     
                                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="mod_con">Modificar datos</button>
                </div>
                <!-- /.card-footer -->
              </form>
              <div class="card-header">
                <h3 class="card-title">Formato de constancia</h3>
              </div>
              <!-- Aqui es para la imagen -->
              <form class="form-horizontal" id="imagen" method="post" action="edita_const.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">Formato constancia(importante: el archivo debe ser en formato .jpg o .jpeg con el nombre de "Constancia", de tamaño a una hoja A4 o carta)</label>
                    <br><a href="reconocimientos\Constancia.jpg">Formato actual: </a>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirconst" id="subir_cons" accept="image/jpeg">
                        <label class="custom-file-label" for="exampleInputFile">Examinar</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Subir</span>
                      </div>
                      <br>
                      
                    </div>
                  </div>
                  <div class="card-footer">
                        <button type="submit" class="btn btn-info" name="add_for">Subir imagen</button>
                  </div>
              </form>
              <div class="card-header">
                <h3 class="card-title">Firma (pruebas)</h3>
              </div>
              <form class="form-horizontal" id="imagen" method="post" action="edita_const.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">Sube una imagen de la firma sin fondo</label>
                    <br><a href="reconocimientos\Constancia.jpg">Formato actual: </a>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirconst" id="subir_cons" accept="image/jpeg">
                        <label class="custom-file-label" for="exampleInputFile">Examinar</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Subir</span>
                      </div>
                      <br>
                      
                    </div>
                  </div>
                  <div class="card-footer">
                        <button type="submit" class="btn btn-info" name="add_firma">Firmar (en pruebas)</button>
                  </div>
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

  
