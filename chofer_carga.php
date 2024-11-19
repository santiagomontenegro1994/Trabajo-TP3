<?php
session_start();

if (empty($_SESSION['Usuario_Nombre']) ) { // si el usuario no esta logueado no lo deja entrar
  header('Location: cerrarsesion.php');
  exit;
}

date_default_timezone_set("America/Argentina/Cordoba");
$Fecha_actual = date("Y-m-d");//Aca genero la fecha actual

require ('encabezado.inc.php'); //Aca uso el encabezado que esta seccionados en otro archivo
require ('menu.inc.php'); //Aca uso el encabezado que esta seccionados en otro archivo

  require_once 'funciones/conexion.php';
  $MiConexion=ConexionBD(); //Uso la conexion a la base de datos

  require_once 'funciones/validacion_registro_choferes.php'; 
  require_once 'funciones/insertar_chofer.php';

  $Mensaje='Los campos indicados con (*) son requeridos';
  $Estilo='info';
  if (!empty($_POST['Registrar'])) {
    
      //estoy en condiciones de poder validar los datos
      $Mensaje=Validar_Mensaje();
      $Estilo=Validar_Estilo();
      if (empty($Mensaje)) {
          if (InsertarChoferes($MiConexion) != false) {
              $Mensaje = 'Se ha registrado correctamente.';
              $_POST = array(); 
              $Estilo = 'success'; 
          }
      }
     
  }


?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo chofer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Transportes</li>
          <li class="breadcrumb-item active">Carga Chofer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
        <div class="col-lg-6">

            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingresa los datos</h5>

                <?php if (!empty($Mensaje)) { ?>
                    <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                    <?php echo $Mensaje; ?>
                    </div>
                <?php } ?>

                <form class="row g-3" method='post'>
                 
                <div class="col-12">
                    <label for="Apellido" class="form-label">Apellido (*)</label>
                    <input type="text" class="form-control" name="Apellido" id="apellido"
                    value="<?php echo !empty($_POST['Apellido']) ? $_POST['Apellido'] : ''; ?>">
                </div>

                <div class="col-12">
                    <label for="Nombre" class="form-label">Nombre (*)</label>
                    <input type="text" class="form-control" name="Nombre" id="nombre"
                    value="<?php echo !empty($_POST['Nombre']) ? $_POST['Nombre'] : ''; ?>">
                </div>
                
                <div class="col-12">
                    <label for="dni" class="form-label">DNI (*)</label>
                    <input type="number" class="form-control" name="DNI" id="dni"
                    value="<?php echo !empty($_POST['DNI']) ? $_POST['DNI'] : ''; ?>">
                </div>
              
                <div class="col-12">
                    <label for="pass" class="form-label">Clave</label>
                    <input type="password" class="form-control" name="Clave" id="clave"
                    value="<?php echo !empty($_POST['Clave']) ? $_POST['Clave'] : ''; ?>">
                </div>
                <div class="col-12" style="display: none;">
                    <input type="password" class="form-control" name="FechaActual" id="fechaactual"
                    value="<?php echo $Fecha_actual ?>">
            
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" type="submit" value="Registrar" name="Registrar">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                    <a href="index.php" class="text-primary fw-bold">Volver al index</a>
                </div>
                </form>

            </div>
            </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>-->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script> 
  
  <!--<script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>