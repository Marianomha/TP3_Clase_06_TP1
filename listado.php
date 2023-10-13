<?php require_once 'array.php' ;?>
<?php require_once 'funciones.php' ;?>
<?php $sumaTotalMonto=0; 
$cantidadProductos=0;
$moneda='Dolar'; // puedo setear por 'Pesos' o 'Dolar'
$cotizacion= 1; // 1 es el valor de la cotizacion del dolar, 350 la cotizacion del peso
$imagenLenguaje='Dolares';
$imagenBillete='en';


?>



<!DOCTYPE html>
<html lang="en">

<?php  require_once 'headerlist1.php' ;?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">
            <?php 
              if ($moneda==='Pesos'){
                $imagenLenguaje='Pesos';;
                $imagenBillete='ar';
              }



          ?>
            <img src="assets/img/<?php echo $imagenBillete; ?>.jpg" alt="lang" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $imagenLenguaje; ?></span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav>


  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <?php require_once 'lateral1.php' ;?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>
        Listado de Productos </h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
          <li class="breadcrumb-item active">Los mas vendidos</li>


        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Los mas vendidos </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock Min.</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Venta Web</th>
                        <th scope="col">Monetario en stock</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php 
                      $cantArticulos= count( $articulos);
                      for ($i=0; $i<$cantArticulos; $i++){ 


                      ?>

                      <tr>

                        <th scope="row"><?php echo $i +1  ;?></th>
                        <th scope="row">
                          <a href="#"><img src="assets/img/<?php echo $articulos[$i]['Imagen'] ; ?>.jpg" title="<?php echo $articulos[$i]['Codigo'] ;?>" /></a>
                        </th>

                        <td>
                          <a href="#" class="text-primary fw-bold">
                          <?php echo $articulos[$i]['Texto'] ; ?>
                          </a>

                          <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped <?php echo diferenciaActualMinimo($articulos[$i]['StockActual'], $articulos[$i]['StockMinimo']); ?> progress-bar-animated"
                              role="progressbar" style="width: <?php echo $articulos[$i]['StockActual'] ; ?>%" aria-valuenow="<?php echo $articulos[$i]['StockActual'] ; ?>" aria-valuemin="0"
                              aria-valuemax="100" title='Stock Actual <?php echo $articulos[$i]['StockActual'] ; ?>'></div>
                          </div>
                        </td>

                        <td>
                          <h4>
                            <span class="badge border-info border-1 text-info">
                            <?php echo $articulos[$i]['StockMinimo'] ; ?>
                            </span>
                          </h4>
                        </td>

                        <td>
                          <h4>
                            <span class="badge border-danger border-1 <?php echo colorTextoPrecio($articulos[$i]['StockActual'], $articulos[$i]['StockMinimo']); ?> ">
                            <?php 
                            if($moneda==='Pesos'){

                              echo '$'.$articulos[$i]['Precio'] * $cotizacion ;



                            }
                            if($moneda==='Dolar')
                            echo 'U$S '.$articulos[$i]['Precio'] ; ?> </span>
                            

                          </h4>

                        </td>


                        <td>
                          <h3>
                            <span title= " <?php echo disponibilidadVentaWeb($articulos[$i]['StockActual'], $articulos[$i]['StockMinimo']); ?> "class="badge border-danger border-1 <?php echo colorTextoPrecio($articulos[$i]['StockActual'], $articulos[$i]['StockMinimo']); ?>">
                              <i class="<?php echo carritoEquis($articulos[$i]['StockActual'], $articulos[$i]['StockMinimo']); ?> "></i>

                            </span>
                          </h3>

                        </td>

                        <td>
                          <h4>
                            <span class="badge border-info border-1 text-info">
                              <?php
                               if($moneda==='Pesos'){

                                echo '$ ' .montoMonetario($articulos[$i]['StockActual'], $articulos[$i]['Precio'])* $cotizacion ;

                               }
                               if($moneda==='Dolar'){

                              echo 'U$S ' .montoMonetario($articulos[$i]['StockActual'], $articulos[$i]['Precio']) ;} ?>
                              <?php 

                              $sumaTotalMonto=$sumaTotalMonto +montoMonetario($articulos[$i]['StockActual'], $articulos[$i]['Precio']);

                              ?>
                           </span>
                          </h4>
                        </td>
                      </tr>
                      <?php 
                      if(cantidadProductoVentaWeb($articulos[$i]['StockActual'], $articulos[$i]['StockMinimo'])==='2'){
                         $cantidadProductos= $cantidadProductos + 1;



                      }



                        ?>
                      <?php }?>
                     


                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->



            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">
                    PRODUCTOS <span>| Cantidad para la venta web</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $cantidadProductos; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body"><!--  Stock Actual * Precio -->
                  <h5 class="card-title">
                    Total <span>| Monetario en Stock</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                    <h6> <?php
                               if($moneda==='Pesos'){

                                echo '$ '.$sumaTotalMonto * $cotizacion;

                               }
                               if($moneda==='Dolar'){

                              echo 'U$S ' .$sumaTotalMonto; }?></h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div>


          </div><!-- End Left side columns -->
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require_once 'footerlist1.php' ;?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files 2023-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File 2023-->
  <script src="assets/js/main.js"></script>

</body>

</html>