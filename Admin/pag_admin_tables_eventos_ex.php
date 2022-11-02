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

  
