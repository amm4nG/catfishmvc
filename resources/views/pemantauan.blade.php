<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pemantauan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #4159AF; color: white;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span style="font-size: 16px; color: white;">Catfish <br /> Automatic <br /> Feeder</span>

      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color: white;"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!-- End Notificatioxx```n Nav -->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $foto ?>" alt="Profile" class="rounded-circle" style="background-color: white;">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;"><?php echo $username ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $nama ?></h6>
              <span><?php echo $email ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user_profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="Logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background-color: #4159AF;">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index">
          <i class="bi bi-grid"></i>
          <span>Home Page</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="kontrol">
          <i class="bi bi-layout-text-window-reverse"></i><span>Kontrol</span></i>
        </a>

      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pencatatan">
          <i class="bi bi-bar-chart"></i><span>Pencatatan</span></i>
        </a>

      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link " href="pemantauan">
          <i class="bi bi-eyeglasses"></i><span>Pemantauan</span></i>
        </a>

      </li><!-- End Charts Nav -->




    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Sisa Pakan <span>| Hari Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hourglass-split"></i>
                    </div>
                    
                    <?php
                    if($percentage < 20){
                      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                      echo '<script>
                              $(document).ready(function(){
                                  Swal.fire({
                                      icon: "warning",
                                      title: "Peringatan",
                                      text: "Stok pakan hampir habis",
                                      confirmButtonText: "OK"
                                  })
                              });
                            </script>';
                    };

                    if($percentage > 80){
                      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                      echo '<script>
                              $(document).ready(function(){
                                  Swal.fire({
                                      icon: "info",
                                      title: "Informasi",
                                      text: "Stok pakan aman",
                                      confirmButtonText: "OK"
                                  })
                              });
                            </script>';
                    };
                    

                    ?>


                    <div class="ps-4">
                      <div class="progress" style="width: 200%;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo number_format($percentage); ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="text-success small pt-1 fw-bold"><?php echo number_format($percentage); ?>%</span>
                      <span class="text-muted small pt-2 ps-1">Tersisa</span>
                    </div>

                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered"><i class="bi bi-pencil"></i></a>
                  <div class="modal fade" id="verticalycentered" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Formulir -->
                          <form action="update_minimum" method="post">
                            @csrf
                            <div class="row mb-3">
                              <label for="inputNumber" class="col-sm-2 col-form-label">Batas Minimum</label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="min" id="inputNumber">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" style="background-color: #4159AF;">Save changes</button>
                            </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Minimal <span>| Stok</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-inboxes"></i>
                    </div>
                    <div class="ps-3">


                      <h6><?php echo $stok->min ?> %</h6>
                      <!-- <span class="text-success small pt-1 fw-bold"><?php echo number_format($percentage); ?>%</span> <span class="text-muted small pt-2 ps-1">Hari Ini</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Stok <span>| Hari Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clock"></i>

                    </div>

                    <div class="ps-3">


                      <h6 id="clock" style="font-size: 18px;"><?php echo date('l, d F Y'); ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">

            </div><!-- End Reports -->

            <!-- Recent Sales -->


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">



                <div class="card-body pb-0">
                  <h5 class="card-title">Jadwal Pemberian Pakan <span>| Hari Ini</span></h5>

                  <table class="table datatable">


                    <thead>
                      <tr>
                        <th>No </th>
                        <th>ID </th>
                        <th>Tanggal</th>
                        <th>Stok</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pakanList as $index => $pakan)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $pakan->id }}</td>
                          <td>{{ $pakan->tanggal }}</td>
                          <td>{{ $pakan->pakan }}</td>
                          <td>
                              <!-- Edit Button -->                              
                              <a type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $pakan->id }}">
                                <i class="bi bi-pencil" style="color: black; font-size: 20px;"></i>
                              </a>
      
                              <!-- Edit Modal -->
                              <div class="modal fade" id="editModal{{ $pakan->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $pakan->id }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="editModalLabel{{ $pakan->id }}">Edit Data</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              <form action='update_pakan' method="post">
                                                  @csrf
                                                  <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">ID</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="id" value="{{ $pakan->id }}" readonly>
                                                    </div>
                                                  </div>
                                                  <div class="row mb-3">
                                                    <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah</label>
                                                    <div class="col-sm-10">
                                                      <input type="number" class="form-control" name="pakan" id="inputNumber" value="{{ $pakan->pakan }}" required>
                                                    </div>
                                                  </div>                                    
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" style="background-color: #4159AF;">Save changes</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
      
                              <!-- Delete Button -->
                              <a type="button" class="px-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pakan->id }}">
                                <i class="bi bi-trash" style="color: black; font-size: 20px;"></i>
                              </a>
      
                              <!-- Delete Modal -->
                              <div class="modal fade" id="deleteModal{{ $pakan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $pakan->id }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="deleteModalLabel{{ $pakan->id }}">Hapus Data</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              Apakah yakin ingin menghapus data?
                                          </div>
                                          <div class="modal-footer">
                                              <form action='hapus_pakan' method="post">
                                                  @csrf
                                                  <input type="hidden" name="id" value="{{ $pakan->id }}">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-danger">Hapus Data</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
            </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->


      <!-- Budget Report -->


      <!-- Website Traffic -->


      <!-- News & Updates Traffic -->


      </div><!-- End Right side columns -->

    </section>

    <a data-bs-toggle="modal" data-bs-target="#adddata">
      <div style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; background: #4159AF; border-radius: 50%; text-align: center;">
        <i class="bi bi-plus-lg" style="font-size: 35px; font-weight: bold; color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
      </div>
    </a>

    <div class="modal fade" id="adddata" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="tambah_stok" method="post">
              @csrf
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="pakan" id="inputNumber" required>
                </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color: #4159AF;">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script>
    function updateClock() {
      var now = new Date();
      var hours = ('0' + now.getHours()).slice(-2);
      var minutes = ('0' + now.getMinutes()).slice(-2);
      var seconds = ('0' + now.getSeconds()).slice(-2);
      var day = now.toLocaleDateString('en-US', {
        weekday: 'long'
      });
      var date = ('0' + now.getDate()).slice(-2);
      var month = now.toLocaleDateString('en-US', {
        month: 'long'
      });
      var year = now.getFullYear();

      document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds + ' | ' + day + ', ' + date + ' ' + month + ' ' + year;
    }

    setInterval(updateClock, 1000); // Update setiap detik
  </script>
  <script>
    function submitForm() {
      document.getElementById("updateForm").submit();
    }
  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>