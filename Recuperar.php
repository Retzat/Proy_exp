<?php
    session_start();
    if(isset($_SESSION['usuario_ad'])){
        header("location: pagina_qr.php");
    }
    else if(isset($_SESSION['usuarioad'])){
        header("location: Admin/pag_admin.php");
    }
    else if(isset($_SESSION['usuario_ex'])){
      header("location: pagina_qr.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Exposistemas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/estilos.css" />

  </head>
 
  <!-- Script para que acepte solo letras en los campos de texto-->
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
  <body>
    <main>

      <div class="contenedor_general">
        <div class="limite">
          <div class="limite_login">
            <!-- Limite de la caja posterior parte del login-->
            <h3>¿Estas registrado?</h3>
            <p>Inicia sesión para obtener tu código</p>
            <button id="btn_login">Iniciar sesión</button>
          </div>

          <div class="limite_registro">
            <!-- Limite de la caja posterior parte del registro-->
            <h3>¿Aun no te registras?</h3>
            <p>Regístrate para iniciar sesión</p>
            <button id="btn_login_do">Registrarse como docente</button><br>
            <button id="btn_login_al">Registrarse como alumno</button><br>
            <button id="btn_login_ex">Registrarse como asistente externo</button>
          </div>
        </div>

        <div class="contenedor_formularios">

          <form action="php/rec_contra.php" method="POST" class="formulario_recuperar">
              <h2>Recuperar contraseña</h2>
              <input type="email" name="correo_rec" placeholder="Correo electrónico" />
              <button>Enviar</button>
          </form> 

          

      </div>
    </div>
    </main>
    <script src="assets/js/script.js"></script>
    
  </body>
</html>
