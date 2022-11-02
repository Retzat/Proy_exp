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
            <h1>Segundo registro</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Segundo registro de asistencia</h3>          
        </div>
        <div class="card-body">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Actualización a registro</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="crear-admin" method="post" action="model_insert_registro.php">
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <video id="preview" width="100%"></video>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Codigo QR</label>
                            <input type="text" name="text2" id="qr_code" readonny="" placeholder="Escanea tu QR" class="form_control">                            
                        </div>                       
                      </div>
                   </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="add_reg2">Generar segundo registro</button>
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
  <script>
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
            Instascan.Camera.getCameras().then(function(cameras){
                if (cameras.length > 0){
                    scanner.start(cameras[0]);
                }else{
                    alert('No se encontro ninguna camara')
                }
            }).catch(function(e){
                console.error(e);
            });
            
            scanner.addListener('scan',function(c){
                document.getElementById('qr_code').value=c;
                //document.forms[0].submit();
            });
        </script>
<?php
  include_once 'templates/footer.php';
?>

  
