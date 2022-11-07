<?php
    session_start();
    //echo "entre exitosamente";
    if(!isset($_SESSION['usuario_ex'])){
        //echo "entre exitosamente a donde no debia";
        echo '<script>alert("Inicia sesion para poder acceder");window.location="../index.php";</script>';
        //header("location: index.php");
        session_destroy();
        die();
    }
    else{
        include_once '../conexion_be.php';
        $email=$_SESSION['usuario_ex'];
    }
    include_once "templates/header.php";
?>
<section class="content">
<div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Llenado de perfil de invitado</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <form class="form-horizontal" method="post" action="registrar_desc.php">
                  <div class="row">
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email ?>" readonly>
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
                  </div>
                  <div class="row">
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tema de presentación</label>
                        <input type="text" class="form-control" name="presentacion" placeholder="Escribe el nombre de tu presentación" required>
                      </div>
                    </div>
</div>      
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Curriculum</label>
                        <textarea class="form-control" rows="3" name="curriculum" maxlength="500" placeholder="Ingresa tu curriculum, esto se leera para tu presentación" required></textarea>
                      </div>
                    </div>                    
                  </div>
                  <div >
                  <button type="submit" class="btn btn-info" name="add_desc">Agregar descripción</button>
                </div>
                </form>
            </div>
</div>
</section>