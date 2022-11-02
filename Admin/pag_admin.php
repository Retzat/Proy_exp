<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
  $validar_doc_pendientes=mysqli_query($conexion, "SELECT * FROM docente WHERE permiso=0 ");
    if(mysqli_num_rows($validar_doc_pendientes)>0){
        echo '<script>alert("Hay docentes pendientes de aceptar")</script>';
    }
?> 



  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pagina principal</h1><!-- Aqui se pone el titulo -->
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Aquí están las estadísticas del registro </h3>          
        </div>
        <h5 class="mb-2 mt-4">Registros en diversas areas</h5>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $sql="SELECT COUNT(*) AS total_registros FROM alumnos";
                  $resultado=$conexion->query($sql);
                  echo "<h3>".$resultado->fetch_assoc()['total_registros']."</h3>";
                ?>

                <p>Conferencistas externos</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-chalkboard-user"></i>
              </div>
              <a href="crear_evento_ex.php" class="small-box-footer">
                Registrar más <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $sql="SELECT COUNT(*) AS total_registros FROM externos where participacion=0";
                  $resultado=$conexion->query($sql);
                  echo "<h3>".$resultado->fetch_assoc()['total_registros']."</h3>";
                ?>

                <p>Personas externas registradas</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-group"></i>
              </div>
              <a href="pag_admin_tables_ex.php" class="small-box-footer">
                Ver lista <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $sql="SELECT COUNT(*) AS total_registros FROM alumnos";
                  $resultado=$conexion->query($sql);
                  echo "<h3>".$resultado->fetch_assoc()['total_registros']."</h3>";
                ?>

                <p>Alumnos registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="pag_admin_tables_al.php" class="small-box-footer">
                Ver lista <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                  $sql="SELECT COUNT(*) AS total_registros FROM eventos";
                  $resultado=$conexion->query($sql);
                  $sql2="SELECT COUNT(*) AS total_registros FROM eventos_externos";
                  $resultado2=$conexion->query($sql2);
                  $total=$resultado->fetch_assoc()['total_registros']+$resultado2->fetch_assoc()['total_registros'];
                  echo "<h3>".$total."</h3>";
                ?>

                <p>Eventos registrados</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-person-burst"></i>
              </div>
              <a href="pag_admin_tables_eventos.php" class="small-box-footer">
                Ver eventos <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
        
        
        <!-- /.card-body -->
        <div class="card-footer">
          Datos acerca del proyecto
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  include_once 'templates/footer.php';
?>

  
