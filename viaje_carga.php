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

//genero una variable para usar mi conexion desde donde me haga falta
//no envio parametros porque ya los tiene definidos por defecto
$MiConexion = ConexionBD();

require_once 'funciones/select_choferes.php';
require_once 'funciones/select_transportes.php';
require_once 'funciones/select_destinos.php';

//voy a ir listando lo necesario para trabajar en este script: 
$ListadoChoferes = Listar_Choferes($MiConexion);
$CantidadChoferes = count($ListadoChoferes);

$ListadoTransportes = Listar_Transportes($MiConexion);
$CantidadTransportes = count($ListadoTransportes);

$ListadoDestinos = Listar_Destinos($MiConexion);
$CantidadDestinos = count($ListadoDestinos);

//voy a ir haciendo el proceso necesario para registrar un viaje

require_once 'funciones/validacion_registro_viaje.php';
require_once 'funciones/insertar_viaje.php';

  $Mensaje='Los campos indicados con (*) son requeridos';
  $Estilo='info';
  
  if (!empty($_POST['Registrar'])) {
      //estoy en condiciones de poder validar los datos
      $Mensaje=Validar_Mensaje();
      $Estilo=Validar_Estilo();
      if (empty($Mensaje)) {
          if (InsertarViajes($MiConexion) != false) {
              $Mensaje = 'Se ha registrado correctamente.';
              $_POST = array();
              $Estilo = 'success';
          }
      }
     
  }




?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo viaje</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Carga</li>
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
<!--
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Mensajes de Alerta por validaciones
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Los datos se guardaron correctamente! 
                </div>
-->
                <form class="row g-3" id='miFormulario' method='post'>
                    <div class="col-12">
                        <label for="selector" class="form-label">Chofer (*)</label>
                        <select class="form-select" aria-label="Selector" name="Chofer" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <?php for ($i=0; $i<$CantidadChoferes; $i++) { ?>
                            <option value="<?php echo $ListadoChoferes[$i]['ID']; ?>">
                              <?php echo $ListadoChoferes[$i]['NOMBRE']; ?>, 
                            <?php echo $ListadoChoferes[$i]['APELLIDO']; ?> 
                            (DNI <?php echo $ListadoChoferes[$i]['DNI']; ?>)</option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="selector" class="form-label">Transporte Habilitado (*)</label>
                        <select class="form-select" aria-label="Selector" name="Transporte" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <?php for ($i=0; $i<$CantidadTransportes; $i++) { ?>
                            <option value="<?php echo $ListadoTransportes[$i]['ID']; ?>"> 
                            <?php echo $ListadoTransportes[$i]['TIPO']; ?> - 
                            <?php echo $ListadoTransportes[$i]['MARCA']; ?> - 
                            <?php echo $ListadoTransportes[$i]['PATENTE']; ?>
                            </option>
                          <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-12">
                        <label for="fecha" class="form-label">Fecha programada (*)</label>
                        <input type="date" class="form-control"  name="Fecha" id="fecha">
                    </div>
                    <div class="col-12">
                        <label for="selector" class="form-label">Destino (*)</label>
                        <select class="form-select" aria-label="Selector"  name="Destino" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <?php for ($i=0; $i<$CantidadDestinos; $i++) { ?>
                            <option value="<?php echo $ListadoDestinos[$i]['ID']; ?>">
                              <?php echo $ListadoDestinos[$i]['DENOMINACION']; ?>
                            </option>

                          <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="costo" class="form-label">Costo (*)</label>
                        <input type="number" step="0.01" class="form-control" name="Costo" id="costo">
                    </div>
                    <div class="col-12">
                        <label for="porc" class="form-label">Porcentaje chofer (*)</label>
                        <input type="number" class="form-control" name="Porcentaje" id="porc">
                    </div>
                    <div class="col-12" style="display: none;"> <!-- Carga de Fecha Actual -->
                      <input type="text" class="form-control" name="FechaActual" id="fechaactual"
                      value="<?php echo $Fecha_actual ?>">
                    </div>
                    <div class="col-12" style="display: none;"> <!-- Carga de usuario -->
                      <input type="number" class="form-control" name="IdUsuario" id="idUsuario"
                      value=<?php echo $_SESSION['Usuario_ID'] ?>>
                    </div>



                    

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" value="Registrar" name="Registrar">Registrar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                        <a href="index.php" class="text-primary fw-bold">Volver al index</a>
                    </div>
                </form><!-- Vertical Form -->

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