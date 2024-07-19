<?php include './headerpage.php'; ?>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <?php include './headerimage.php'; ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php include './navigation.php'; ?>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class="s-1"></span>
                <span class="s-2"></span>
                <span class="s-3"></span>
              </button>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section">
      <div class="carousel_btn-container">
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
        </ol>
        <?php include './carousel.php'; ?>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- experience section -->
  <section class="experience_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="../img/path-to-cek-saldo-icon.png" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Silakan Cek Saldo Anda Disini
              </h2>
            </div>
            <p>
              Masukkan no rekening Anda disini:
            </p>
            <form id="cek-saldo-form">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" name="no_rek" placeholder="Nomor Rekening" aria-label="Nomor Rekening" aria-describedby="basic-addon1" required>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-magnifying-glass"></i> Cari</button>
                </div>
              </div>
            </form>

            <div id="result-box" class="result-box"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end experience section -->

  <?php include './info.php'; ?>
  <?php include './footerpage.php'; ?>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>

  <script>
    $(document).ready(function() {
      $('#cek-saldo-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way

        $.ajax({
          url: './cek_saldo_ajax.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data) {
            let resultBox = $('#result-box');
            if (data.error) {
              resultBox.html('<p>' + data.error + '</p>');
            } else {
              resultBox.html(
                `<h2>Informasi Saldo Nasabah</h2>
                 <p>No Rekening: ${data.no_rek}</p>
                 <p>Nama Nasabah: ${data.nama_nasabah}</p>
                 <p>Jenis Kelamin: ${data.jenis_kelamin}</p>
                 <p>Alamat: ${data.alamat}</p>
                 <p>Tanggal Mulai: ${data.tgl_mulai}</p>
                 <p>Saldo Akhir: Rp ${parseFloat(data.saldo_akhir).toLocaleString('id-ID', { minimumFractionDigits: 2 })}</p>
                 <p>Kolektor: ${data.kolektor}</p>`
              );
            }
          },
          error: function() {
            $('#result-box').html('<p>Terjadi kesalahan dalam memproses permintaan.</p>');
          }
        });
      });
    });
  </script>
</body>
</html>
