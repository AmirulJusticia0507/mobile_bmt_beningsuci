<?php include './headerpage.php'; ?>
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
  <br><br><br>

<!-- about section -->
<section class="about_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-9 mx-auto">
                <div class="img-box">
                    <img src="../nasabah/images/news_866_seragam_baru_frontliner_bank_muamalat.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="detail-box">
            <h2>
                About BMT Bening Suci
            </h2>
            <p>
                Lembaga Keuangan berbasis syariah yang berlokasi di utara Prambanan Temple, menyediakan berbagai produk tabungan jangka pendek dan jangka panjang dengan bagi hasil kompetitif. Juga berbagai produk pembiayaan bisnis maupun pengadaan barang konsumtif.
            </p>
            <a href="#" data-toggle="modal" data-target="#aboutModal">Read More.....</a>
        </div>
    </div>
</section>
<!-- end about section -->

<!-- Modal About -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalLabel">About BMT Bening Suci</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Lembaga Keuangan berbasis syariah yang berlokasi di utara Prambanan Temple, menyediakan berbagai produk tabungan jangka pendek dan jangka panjang dengan bagi hasil kompetitif. Juga berbagai produk pembiayaan bisnis maupun pengadaan barang konsumtif.
                </p>
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