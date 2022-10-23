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

          <form action="login_alumno.php" method="POST" class="formulario_login">
              <h2>Iniciar sesión</h2>
              <input type="email" name="correo_login" placeholder="Correo electrónico" />
              <input type="password" name="pass_login" placeholder="Contraseña" />
              <button>Iniciar sesión</button>
          </form>

          <form action="registro_alumnos.php" method="POST" class="formulario_registro_alumnos">
              <h2>Registrarse</h2>
              <!--Recoleccion de datos de alumnos-->
              <input type="text" name="nombres_al" placeholder="Nombres" onkeypress="return soloLetras(event)"  requiered/>
              <input type="text" name="ap_pat_al" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" required/>
              <input type="text" name="ap_mat_al" placeholder="Apellido materno" onkeypress="return soloLetras(event)" required/>
              <input type="text" name="num_control_al" placeholder="Número de control" minlength="9" maxlength="9" onkeypress="return check(event)" required/>
              <h5>Selecciona semestre</h5>
              <select name="semestre_al" required>
                  <option value="">Elige una opción</option>
                  <option value="1">Primer semestre</option>
                  <option value="2">Segundo semestre</option>
                  <option value="3">Tercer semestre</option>
                  <option value="4">Cuarto semestre</option>
                  <option value="5">Quinto semestre</option>
                  <option value="6">Sexto semestre</option>
                  <option value="7">Septimo semestre</option>
                  <option value="8">Octavo semestre</option>
              </select>
              <i></i>
              <input type="email" name="email_al" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' placeholder="Correo electrónico" required/>
              <input type="text" name="tel_al" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" required/>
              <!-- La funcion usada en on key arriba es para evitar letras en el numero telefonico-->
              <input type="password" name="pass1_al" placeholder="Contraseña" />
              <input type="password" name="pass2_al" placeholder="Confirmar contraseña" />
              <!--botones de radio para determinar si se es ponente u oyente-->
              <div class="opciones-radio">
                <div class="form-group">
                  <span class="opcion-radio">
                    <input type="radio" value="oyente" name="participacion_al" id="oyente"> 
                    <label for="interesado">Oyente</label> 
                  </span>
                  <span class="opcion-radio">
                    <input type="radio" value="expositor" name="participacion_al" id="expositor"> 
                    <label for="indeciso">Expositor</label> 
                  </span>
                </div>
              </div>
              <button type="submit">Registrarse</button>            
          </form>

          <form action="" class="formulario_registro_docentes">
            <h2>Registrarse</h2>
            <!--Recoleccion de datos de docentes-->
            <input type="text" name="nombres_do" placeholder="Nombres" onkeypress="return soloLetras(event)"  requiered/>
            <input type="text" name="ap_pat_do" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" required/>
            <input type="text" name="ap_mat_do" placeholder="Apellido materno" onkeypress="return soloLetras(event)" required/>
            <h5>Selecciona puesto de academia</h5>
            <select name="puesto" name="puesto_do" placeholder="puesto" required>
              <option value="">Elige una opción</option>
              <option value="1">Coordinador del programa general</option>
              <option value="2">Coordinador de seguimiento y logística</option>
              <option value="3">Coordinador de atención a conferencistas</option>
              <option value="4">Coordinador de registro de participantes</option>
              <option value="5">Coordinador de presentación de proyectos</option>
              <option value="6">Coordinador de contacto a conferencistas</option>
              <option value="7">No pertenezo a la academia</option>
            </select>
            <input type="text" name="rfc_do" placeholder="RFC" onkeypress="return check(event)" minlength="13" maxlength="13" required/>
            <h5>Seleccione grado</h5>
            <select name="grado" name="grado_do" placeholder="Grado" required>
                <option value="">Elige una opción</option>
                <option value="1">Ingeniero/a</option>
                <option value="2">Maestro/a</option>
                <option value="3">Doctor/a</option>
              </select>
            <input type="email" name="email_do" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' title="Entre un email válido" placeholder="Correo electrónico" required/>
            <input type="text" name="tel_do" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" required/>
            <!-- La funcion usada en on key arriba es para evitar letras en el numero telefonico-->
            <input type="password" name="pass1_do" placeholder="Contraseña" />
            <input type="password" name="pass2_do" placeholder="Confirmar contraseña" />          
            <button type="submit">Registrarse</button>
            
        </form>

        <form action="" class="formulario_registro_externos">
          <h2>Registrarse</h2>
          <!--Recoleccion de datos de personas externas-->
          <input type="text" name="nombres_ex" placeholder="Nombres" onkeypress="return soloLetras(event)"  requiered/>
          <input type="text" name="ap_pat_ex" placeholder="Apellido paterno" onkeypress="return soloLetras(event)" required/>
          <input type="text" name="ap_mat_ex" placeholder="Apellido materno" onkeypress="return soloLetras(event)" required/>
          <input type="text" name="procedencia_ex" placeholder="Procedencia" onkeypress="return soloLetras(event)" required/>        
          <input type="email" name="email_ex" placeholder="Correo electrónico" pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' required/>
          <input type="text" name="tel_ex" placeholder="Número telefónico" minlength="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" required/>
          <!-- La funcion usada en on key arriba es para evitar letras en el numero telefonico-->
          <input type="password" name="pass1_ex" placeholder="Contraseña" />
          <input type="password" name="pass2_ex" placeholder="Confirmar contraseña" />
          <!--botones de radio para determinar si se es ponente u oyente-->
          <div class="opciones-radio">
            <div class="form-group">
              <span class="opcion-radio">
                <h5>Selecciona semestre</h5>
                <input type="radio" name="participacion_ex" value="oyente" id="oyente"> 
                <label for="interesado">Oyente</label> 
              </span>
              <span class="opcion-radio">
                <input type="radio" name="participacion_ex" value="expositor" id="expositor"> 
                <label for="indeciso">Expositor</label> 
              </span>
            </div>
          </div> 
          <button type="submit">Registrarse</button>
          
        </form>

      </div>
    </div>
    </main>
    <script src="assets/js/script.js"></script>
    
  </body>
</html>
