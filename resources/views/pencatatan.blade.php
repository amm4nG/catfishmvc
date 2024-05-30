<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pencatatan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <!-- Favicons -->

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

        <!-- End Notification Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $foto?>" alt="Profile" class="rounded-circle" style="background-color: white;" >
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;"><?php echo $username?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $nama?></h6>
              <span><?php echo $email?></span>
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
        <a class="nav-link" href="pencatatan">
          <i class="bi bi-bar-chart"></i><span>Pencatatan</span></i>
        </a>

      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pemantauan">
          <i class="bi bi-eyeglasses"></i><span>Pemantauan</span></i>
        </a>

      </li><!-- End Charts Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Jadwal</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Waktu</th>
                                    <th style="width: 50%;" class="text-center">Catatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catatans as $key => $catatan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $catatan->id }}</td>
                                    <td>{{ $catatan->waktu }}</td>
                                    <td class="text-center">{{ $catatan->catatan }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $catatan->id }}">
                                            <i class="bi bi-pencil" style="color: black; font-size: 20px;"></i>
                                        </a>
    
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $catatan->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulir -->
                                                        <form action='edit_pencatatan' method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-sm-2 col-form-label">ID</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" class="form-control" name="id" value="{{$catatan->id}}" readonly>
                                                                </div>
                                                              </div>
                                                            <div class="row mb-3">
                                                                <label for="inputDateTime" class="col-sm-2 col-form-label">Waktu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="datetime-local" class="form-control" name="waktu" id="inputDateTime" value="{{ $catatan->waktu }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="inputCatatan" class="col-sm-2 col-form-label">Catatan</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" name="catatan" rows="5">{{ $catatan->catatan }}</textarea>
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
                                        <a type="button" class="px-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $catatan->id }}">
                                            <i class="bi bi-trash" style="color: black; font-size: 20px;"></i>
                                        </a>
    
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $catatan->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah yakin ingin menghapus data?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action='hapus_pencatatan'>
                                                            @csrf
                                                            <input type="text" class="form-control" name="id" value={{$catatan->id}} readonly hidden>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" style="background-color: red;">Hapus Data</button>
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
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
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
            <form action="tambah_catatan" method="post">
              @csrf
              <div class="row mb-3">
                <label for="inputDateTime" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" name="waktu" id="inputDateTime" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputCatatan" class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="catatan" rows="5"></textarea>
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
  <script>
    $(document).ready(function(){
        $('#updateForm').on('submit', function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                type: 'PUT',
                url: url,
                data: formData,
                success: function(response){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = "{{ route('kontrol') }}"; // Redirect ke kontrol setelah berhasil
                    });
                },
                error: function(xhr, status, error){
                    var errorMessage = xhr.responseJSON.message;
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: errorMessage,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        var confirmation = confirm("Apakah Anda ingin kembali ke halaman sebelumnya?");
                        if (confirmation) {
                            window.location.href = "{{ route('kontrol') }}"; // Redirect ke kontrol setelah gagal
                        } else {
                            window.history.back();
                        }
                    });
                }
            });
        });
    });
  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>