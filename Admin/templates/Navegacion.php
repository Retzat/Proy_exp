<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Expo-<b>Sistemas</b></span>
    </a>

    <!-- Sidebar --> 
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/perrosim.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Exposistemas</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estadísticas</p>
                </a>
              </li>              
            </ul>
          </li>          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Eventos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa-solid fa-table-list"></i>
                  <p>  Ver eventos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pag_admin_tables_eventos.php" class="nav-link">
                  <i class="fa-regular fa-calendar-plus"></i>
                  <p>  Registrar Evento</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Listas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pag_admin_tables_al.php" class="nav-link">
                  <i class="fa-solid fa-list-ul"></i>
                  <p>Ver lista alumnos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pag_admin_tables_ex.php" class="nav-link">
                  <i class="fa-regular fa-rectangle-list"></i>
                  <p>Ver lista externos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pag_admin_tables.php" class="nav-link">
                  <i class="fa-regular fa-rectangle-list"></i>
                  <p>Ver Docentes</p>
                </a>
              </li>               
            </ul>
          </li>
          
          <li class="nav-header">GENERAR</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Documentación
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
            <i class="fa-regular fa-file-excel"></i>
              <p>
                Generar Excel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-file"></i>
              <p>
                Ver constancias
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-person-chalkboard"></i>
              <p>
                Ivitados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Reg_adm.php" class="nav-link">
              <i class="fa-solid fa-user-plus"></i>
              <p>
                Agregar docente
              </p>
            </a>
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>