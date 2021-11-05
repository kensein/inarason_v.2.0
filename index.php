<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="./assets/logo/logo.png">

  <title>Dashboard Integrasi Data Radiosonde</title>

  <link rel="canonical" href="http://puslitbang.bmkg.go.id/inarason_v2/">

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/product.css" rel="stylesheet">
</head>

<body>

  <nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="http://puslitbang.bmkg.go.id/inarason_v2/">
        <img src="assets/logo/logo.png" alt="logo" width="24" height="24" />
      </a>
      <a class="py-2 d-none d-md-inline-block" href="./inarason.php">InaRASONIS</a>
      <a class="py-2 d-none d-md-inline-block" href="./skewt.php">Skew-T</a>
      <a class="py-2 d-none d-md-inline-block" href="./rason_correction.php">Rason Correction</a>
      <a class="py-2 d-none d-md-inline-block" href="./csm.php">Cold-Surge Monitoring</a>
      <a class="py-2 d-none d-md-inline-block" href="http://202.90.198.221/sonde-net/" target="_blank" rel="noopener noreferrer">Sonde-Net</a>
    </div>
  </nav>

  <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light card">
    <img class="card-img" src="./assets/img/inarason.png" style="
  width: 100%; height: 30vw; object-fit: fill;">
    <div class="card-img-overlay text-black d-flex justify-content-center align-items-end">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">InaRason V.2.0</h1>
        <p class="lead font-weight-normal">merupakan aplikasi berbasis web yang mengintegrasikan data Radiosonde BMKG di Indonesia untuk membantu forecaster dalam membuat analisa data udara atas dan peneliti dalam melakukan riset terkait dengan fenomena atmosfer / cuaca di indonesia.</p>
        <a class="btn btn-outline-secondary" href="./inarason.php">Under Development</a>
      </div>

    </div>
  </div>
  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Skew-T</h2>
        <p class="lead">Data Historis Skew-T yang di generate berdasarkan pengamatan Radiosonde menggunakan package skewt python.</p>
      </div>
      <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <img src="./assets/img/skewt.png" style="width: 100%; height: 100%; border-radius: 21px 21px 0 0; object-fit: fill;">
      </div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Rason Correction</h2>
        <p class="lead">Proses koreksi Data Radiosonde antara Meisei dan Vaisala.</p>
      </div>
      <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <img src="./assets/img/rason_correction.png" style="width: 100%; height: 100%; border-radius: 21px 21px 0 0; object-fit: fill;">
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Cold Surge Monitoring</h2>
        <p class="lead">Monitoring pergerakan indeks Northerly Cold-Surge.</p>
      </div>
      <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <img src="./assets/img/necs.png" style="width: 100%; height: 100%; border-radius: 21px 21px 0 0; object-fit: fill;">
      </div>
    </div>
    <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Sonde-Net</h2>
        <p class="lead">Terhubung dengan Monitoring data Radiosonde melalui Sounding Network.</p>
      </div>
      <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <img src="./assets/img/sonde-net.png" style="width: 100%; height: 100%; border-radius: 21px 21px 0 0; object-fit: fill;">
      </div>
    </div>
  </div>

  <footer class="container py-2">
    <div class="boldText" align="center">
      Copyright ©2021 Center for Research and Development - BMKG Indonesia. All Rights Reserved
      <br>
      Contact us : <a href="mailto:puslitbang@bmkg.go.id">puslitbang@bmkg.go.id</a>
      <br>
      <br>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script>
    Holder.addTheme('thumb', {
      bg: '#55595c',
      fg: '#eceeef',
      text: 'Thumbnail'
    });
  </script>
</body>

</html>