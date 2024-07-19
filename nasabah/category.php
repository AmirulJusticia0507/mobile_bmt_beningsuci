<?php include './headerpage.php'; ?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
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
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <section class="category_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          PRODUK SIMPANAN
        </h2>
      </div>
      <div class="category_container">
        <!-- Simpanan WADIAH -->
        <div class="box" data-toggle="modal" data-target="#modalWadiah">
          <div class="img-box">
            <i class="fas fa-hand-holding-usd fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan WADIAH
            </h5>
          </div>
        </div>
        <!-- Simpanan HAJI & UMRAH -->
        <div class="box" data-toggle="modal" data-target="#modalHajiUmrah">
          <div class="img-box">
            <i class="fas fa-mosque fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan HAJI & UMRAH
            </h5>
          </div>
        </div>
        <!-- Simpanan PENDIDIKAN -->
        <div class="box" data-toggle="modal" data-target="#modalPendidikan">
          <div class="img-box">
            <i class="fas fa-graduation-cap fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan PENDIDIKAN
            </h5>
          </div>
        </div>
        <!-- Simpanan IDUL FITRI -->
        <div class="box" data-toggle="modal" data-target="#modalIdulFitri">
          <div class="img-box">
            <i class="fas fa-calendar-alt fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan IDUL FITRI
            </h5>
          </div>
        </div>
        <!-- Simpanan WALIMAH -->
        <div class="box" data-toggle="modal" data-target="#modalWalimah">
          <div class="img-box">
            <i class="fas fa-ring fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan WALIMAH
            </h5>
          </div>
        </div>
        <!-- Simpanan Kelahiran -->
        <div class="box" data-toggle="modal" data-target="#modalKelahiran">
          <div class="img-box">
            <i class="fas fa-baby fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan Kelahiran
            </h5>
          </div>
        </div>
        <!-- Qurban -->
        <div class="box" data-toggle="modal" data-target="#modalQurban">
          <div class="img-box">
            <i class="fas fa-cow fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Qurban
            </h5>
          </div>
        </div>
        <!-- Agigah -->
        <div class="box" data-toggle="modal" data-target="#modalAgigah">
          <div class="img-box">
            <i class="fas fa-piggy-bank fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Aqiqah
            </h5>
          </div>
        </div>
        <!-- Simpanan Berjangka Barokah -->
        <div class="box" data-toggle="modal" data-target="#modalBerjangkaBarokah">
          <div class="img-box">
            <i class="fas fa-calendar-day fa-3x"></i>
          </div>
          <div class="detail-box">
            <h5>
              Simpanan Berjangka Barokah
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end category section -->

  <!-- Modal Simpanan WADIAH -->
  <div class="modal fade" id="modalWadiah" tabindex="-1" role="dialog" aria-labelledby="modalWadiahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalWadiahLabel">Simpanan WADIAH</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan Mitra yang dapat diambil kapan saja namun tidak mendapatkan bagi hasil. Simpanan ini hanya mendapatkan bonus yang ditentukan oleh pihak manajemen setiap bulannya. Adapun nisbah atau nilai baginya adalah 1:78 dari pendapatan BMT.
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Simpanan HAJI & UMRAH -->
  <div class="modal fade" id="modalHajiUmrah" tabindex="-1" role="dialog" aria-labelledby="modalHajiUmrahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHajiUmrahLabel">Simpanan HAJI & UMRAH</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan Mitra untuk pendanaan menunaikan ibadah Haji atau Umrah yang dapat diambil ketika hendak berangkat. Simpanan ini akan mendapat bagi hasil setiap bulannya dengan nisbah 20:40 - 30x masing-masing untuk Mitra dan BMT dari pendapatan BMT setiap bulannya.
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Simpanan PENDIDIKAN -->
  <div class="modal fade" id="modalPendidikan" tabindex="-1" role="dialog" aria-labelledby="modalPendidikanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPendidikanLabel">Simpanan PENDIDIKAN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan yang tepat bagi nasabah yang mempersiapkan dana pendidikan di tahun mendatang. Simpanan dapat diambil sewaktu hendak membayar uang sekolah dengan pembagian nisbah 20:80, masing-masing untuk Mitra dan BMT (dari pendapatan BMT setiap bulannya).
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Simpanan IDUL FITRI -->
  <div class="modal fade" id="modalIdulFitri" tabindex="-1" role="dialog" aria-labelledby="modalIdulFitriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalIdulFitriLabel">Simpanan IDUL FITRI</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan yang ditujukan bagi nasabah yang bersiap menghadapi Hari Raya Idul Fitri sekaligus merayakan Lebaran bersama keluarga. Nisbah dan bagi hasil simpanan ini adalah 20:60, masing-masing untuk Mitra dan BMT (dari pendapatan BMT setiap bulannya).
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Simpanan WALIMAH -->
  <div class="modal fade" id="modalWalimah" tabindex="-1" role="dialog" aria-labelledby="modalWalimahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalWalimahLabel">Simpanan WALIMAH</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan yang diperuntukkan bagi pasangan yang akan melangsungkan pernikahan. Ketentuan nisbah untuk simpanan walimah adalah 20:80, masing-masing diberikan kepada Mitra dan BMT (dari pendapatan BMT setiap bulannya).
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Simpanan Kelahiran -->
  <div class="modal fade" id="modalKelahiran" tabindex="-1" role="dialog" aria-labelledby="modalKelahiranLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalKelahiranLabel">Simpanan Kelahiran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan yang cocok bagi Mitra yang berniat menyelenggarakan Kelahiran, Qurban, dan Agigah. Dana dari simpanan ini dapat diambil menjelang melahirkan, Hari Raya Kurban, serta Agigah. Nilai pembagian nisbahnya adalah 20:80 (dari pendapatan BMT setiap bulannya).
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Simpanan Berjangka Barokah -->
  <div class="modal fade" id="modalBerjangkaBarokah" tabindex="-1" role="dialog" aria-labelledby="modalBerjangkaBarokahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalBerjangkaBarokahLabel">Simpanan Berjangka Barokah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Simpanan fleksibel yang disesuaikan dengan keinginan Mitra. Ketentuan nisbah antara Mitra dan BMT yaitu:
          <ul>
            <li>Jangka 1 Bulan: 10% - 50K</li>
            <li>Jangka 3 Bulan: 15% - 55K</li>
            <li>Jangka 6 Bulan: 20% - 50K</li>
            <li>Jangka 12 Bulan: 25% - 80K</li>
          </ul>
          Untuk simpanan 12 Bulan, bagi hasil yang sudah berjalan setara 1W (bahkan lebih) tiap bulannya, “dari simpanan Mitra Rp 10.000.000 akan memperoleh Rp 10.000 per bulan”.
          <br>
          (Bagi hasil bersifat FLUKTUATIF bergantung pada pendapatan BMT setiap bulannya.)
        </div>
      </div>
    </div>
  </div>



  <?php include './info.php'; ?>

  <?php include './footerpage.php'; ?>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</body>

</html>