<?php
session_start();

require ('encabezado.inc.php'); //Aca uso el encabezado que esta seccionados en otro archivo
require ('menu.inc.php'); //Aca uso el encabezado que esta seccionados en otro archivo

if (empty($_SESSION['Usuario_Nombre']) ) { // si el usuario no esta logueado no lo deja entrar
  header('Location: cerrarsesion.php');
  exit;
}

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo transporte</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Transportes</li>
          <li class="breadcrumb-item active">Cargar nuevo</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ingresa los datos</h5>

              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="bi bi-info-circle me-1"></i>
                Los campos indicados con (*) son requeridos
              </div>

              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i>
                Mensajes de Alerta por validaciones
              </div>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Los datos se guardaron correctamente!
              </div>

              <form class="row g-3">

                <div class="col-lg-6">
                  <label for="selector" class="form-label">Marca (*)</label>
                  <select class="form-select" aria-label="Selector" id="selector">
                    <option selected="">Selecciona una opción</option>
                    <option>Iveco</option>
                    <option>Volkswagen</option>
                    <option>Volvo</option>
                    <option>Scania</option>
                  </select>
                </div>

                <div class="col-lg-6">
                  <label for="selector" class="form-label">Tipo (*)</label>
                  <select class="form-select" aria-label="Selector" id="selector">
                    <option selected="">Selecciona una opción</option>
                    <option>Utilitario</option>
                    <option>Camión sin acoplado</option>
                    <option>Camión con acoplado</option>
                    <option>Camioneta</option>
                  </select>
                </div>

                <div class="col-lg-6">
                  <label for="patente" class="form-label">Patente (*)</label>
                  <input type="text" class="form-control" id="patente">
                </div>

                <div class="col-lg-6">
                  <label for="modelo" class="form-label">Modelo</label>
                  <input type="text" class="form-control" id="modelo">
                </div>

               
                
                <!--
                    <div class="col-12">
                        <label for="selector" class="form-label">Tipo carga (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <option>Congelados</option>
                          <option>Carga normal</option>
                        </select>
                    </div>
-->
                <div class="col-lg-6">
                  
                  <label class="form-label">Disponibilidad (*)</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1"> Habilitado</label>
                  </div>
                </div>

                <div class="col-lg-6">
                  <label class="form-label">Combustible</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios1">
                    <label class="form-check-label" for="gridRadios1">
                      GNC
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="gridRadios2">
                    <label class="form-check-label" for="gridRadios2">
                      Gasoil
                    </label>
                  </div>
                </div>


                <div class="text-center">
                  <button class="btn btn-primary">Registrar</button>
                  <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                  <a href="index.html" class="text-primary fw-bold">Volver al index</a>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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