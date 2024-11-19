<?php
session_start();

if (empty($_SESSION['Usuario_Nombre']) ) { // si el usuario no esta logueado no lo deja entrar
  header('Location: cerrarsesion.php');
  exit;
}

require ('encabezado.inc.php'); //Aca uso el encabezado que esta seccionados en otro archivo
require ('menu.inc.php'); //Aca uso el encabezado que esta seccionados en otro archivo

require_once 'funciones/conexion.php';

//genero una variable para usar mi conexion desde donde me haga falta
//no envio parametros porque ya los tiene definidos por defecto
$MiConexion = ConexionBD();

//ahora voy a llamar el script con la funcion que genera mi listado
require_once 'funciones/select_viajes.php';


//voy a ir listando lo necesario para trabajar en este script: 
$ListadoViajes = Listar_Viajes($MiConexion);
$CantidadViajes = count($ListadoViajes);

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Lista de viajes registrados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Listado</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Viajes cargados (6)</h5>

              <!-- Default Table -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha Viaje</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Chofer</th>
                    <th scope="col">Transporte</th>

                    <?php if($_SESSION['Usuario_IdNivel'] == 1 || $_SESSION['Usuario_IdNivel'] ==2) {?><!-- valido quien solo puede ver eso -->
                    <th scope="col">Costo Viaje</th>
                    <?php }?>

                    <?php if($_SESSION['Usuario_IdNivel'] == 1 || $_SESSION['Usuario_IdNivel'] ==3) {?><!-- valido quien solo puede ver eso -->
                    <th scope="col">Monto Chofer</th>
                    <?php }?>
                  </tr>
                </thead>
                <tbody >

                  <?php for ($i=0; $i<$CantidadViajes; $i++) { 

                    if ($_SESSION['Usuario_IdNivel'] == 3 && $ListadoViajes[$i]['ID_CHOFER'] != $_SESSION['Usuario_ID']) { 
                      continue; // Salta al siguiente número si el usuario es chofer y no tiene su mismo ID 
                      }

                    list($Title, $Color) = ColorDeFila($ListadoViajes[$i]['FECHA_VIAJE']);  

                    $fechaEspanol = date("d/m/Y", strtotime($ListadoViajes[$i]['FECHA_VIAJE']));// Convertir la fecha a formato español

                    $Porcentaje=($ListadoViajes[$i]['COSTO_VIAJE']/100)*$ListadoViajes[$i]['MONTO_CHOFER'];// Calculo el
                    ?>
                    
                  <tr class="<?php echo $Color; ?>" style="background-color: #FF0000 !important;" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Viaje realizado">
                    <th scope="row"><?php echo $ListadoViajes[$i]['ID']; ?></th>
                    <td><?php echo $fechaEspanol; ?></td>
                    <td><?php echo $ListadoViajes[$i]['DESTINO']; ?></td>
                    <td><?php echo $ListadoViajes[$i]['APELLIDO']; ?>, <?php echo $ListadoViajes[$i]['NOMBRE']; ?></td>
                    <td><?php echo $ListadoViajes[$i]['TIPO']; ?> - <?php echo $ListadoViajes[$i]['MARCA']; ?> - <?php echo $ListadoViajes[$i]['PATENTE']; ?></td>
                    
                    <?php if($_SESSION['Usuario_IdNivel'] == 1 || $_SESSION['Usuario_IdNivel'] ==2) {?><!-- valido quien solo puede ver eso -->
                    <td>$ <?php echo $ListadoViajes[$i]['COSTO_VIAJE']; ?></td>
                    <?php }?>

                    <?php if($_SESSION['Usuario_IdNivel'] == 1 || $_SESSION['Usuario_IdNivel'] ==3) {?><!-- valido quien solo puede ver eso -->
                    <td>$ <?php echo $Porcentaje; ?> 
                      <?php if($_SESSION['Usuario_IdNivel'] == 1 || $_SESSION['Usuario_IdNivel'] ==2) {?>
                        (<?php echo $ListadoViajes[$i]['MONTO_CHOFER']; ?>%)</td>
                      <?php }?>
                    <?php }?>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
              <!-- End Default Table Example -->

              
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