<?php
include 'konekke_local.php';

// Periksa apakah pengguna telah terautentikasi
session_start();
if (!isset($_SESSION['userid'])) {
    // Jika tidak ada sesi pengguna, alihkan ke halaman login
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Produk Simpanan - SITABUNG BMT BENING SUCI</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan link AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Tambahkan link DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="checkbox.css">
    <!-- Sertakan CSS Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="uploadfoto.css"> -->
    <link rel="icon" href="img/logobeningsuci1.png" type="image/png">
    <style>
        /* Tambahkan CSS agar tombol accordion terlihat dengan baik */
        .btn-link {
            text-decoration: none;
            color: #007bff; /* Warna teks tombol */
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .card-header {
            background-color: #f7f7f7; /* Warna latar belakang header card */
        }

        #notification {
            display: none;
            margin-top: 10px; /* Adjust this value based on your layout */
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            color: #333;
        }
    </style>
    <style>
        .myButtonCekSaldo {
            box-shadow: 3px 4px 0px 0px #899599;
            background:linear-gradient(to bottom, #ededed 5%, #bab1ba 100%);
            background-color:#ededed;
            border-radius:15px;
            border:1px solid #d6bcd6;
            display:inline-block;
            cursor:pointer;
            color:#3a8a9e;
            font-family:Arial;
            font-size:17px;
            padding:7px 25px;
            text-decoration:none;
            text-shadow:0px 1px 0px #e1e2ed;
        }
        .myButtonCekSaldo:hover {
            background:linear-gradient(to bottom, #bab1ba 5%, #ededed 100%);
            background-color:#bab1ba;
        }
        .myButtonCekSaldo:active {
            position:relative;
            top:1px;
        }

        #imagePreview img {
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 5px;
            height: 150px;
        }

    </style>
    
<style>
    .category_container .box {
        cursor: pointer;
        border: 1px solid #ddd;
        padding: 20px;
        text-align: center;
        background: #f8f8f8;
        transition: all 0.3s;
    }

    .category_container .box:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .category_container .img-box {
        margin-bottom: 15px;
    }

    .category_container .img-box i,
    .category_container .img-box img {
        max-width: 100%;
    }

    .category_container .detail-box h5 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
    }
</style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <?php include 'header.php'; ?>
        </nav>
        
        <?php include 'sidebar.php'; ?>

        <div class="content-wrapper">
            <!-- Konten Utama -->
            <main class="content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produk Simpanan</li>
                    </ol>
                </nav>

                <!-- Mulai Menambahkan Kode Kategori Simpanan dan Modals di sini -->
                <section class="category_section layout_padding">
                    <div class="container">
                        <div class="heading_container">
                            <h2>
                                PRODUK SIMPANAN
                            </h2>
                        </div>
                        <div class="row category_container">
                            <!-- Simpanan WADIAH -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalWadiah">
                                    <div class="img-box">
                                        <i class="fas fa-hand-holding-usd fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan WADIAH</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Simpanan HAJI & UMRAH -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalHajiUmrah">
                                    <div class="img-box">
                                        <i class="fas fa-mosque fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan HAJI & UMRAH</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Simpanan PENDIDIKAN -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalPendidikan">
                                    <div class="img-box">
                                        <i class="fas fa-graduation-cap fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan PENDIDIKAN</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Simpanan IDUL FITRI -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalIdulFitri">
                                    <div class="img-box">
                                        <i class="fas fa-calendar-alt fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan IDUL FITRI</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Simpanan WALIMAH -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalWalimah">
                                    <div class="img-box">
                                        <i class="fas fa-ring fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan WALIMAH</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Simpanan Kelahiran -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalKelahiran">
                                    <div class="img-box">
                                        <i class="fas fa-baby fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan Kelahiran</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Qurban -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalQurban">
                                    <div class="img-box">
                                        <i class="fas fa-hand-holding-heart fa-3x"></i> <!-- Menggunakan ikon Font Awesome -->
                                    </div>
                                    <div class="detail-box">
                                        <h5>Qurban</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Aqiqah -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalAqiqah">
                                    <div class="img-box">
                                        <i class="fas fa-piggy-bank fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Aqiqah</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Simpanan Berjangka Barokah -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="box" data-bs-toggle="modal" data-bs-target="#modalBerjangkaBarokah">
                                    <div class="img-box">
                                        <i class="fas fa-calendar-day fa-3x"></i>
                                    </div>
                                    <div class="detail-box">
                                        <h5>Simpanan Berjangka Barokah</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end category section -->

                <!-- Modal templates -->

                <!-- Modal Simpanan WADIAH -->
                <div class="modal fade" id="modalWadiah" tabindex="-1" role="dialog" aria-labelledby="modalWadiahLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalWadiahLabel">Simpanan WADIAH</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan Mitra yang dapat diambil kapan saja namun tidak mendapatkan bagi hasil. Simpanan ini hanya mendapatkan bonus yang ditentukan oleh pihak manajemen setiap bulannya. Adapun nisbah atau nilai bagiannya adalah 1:78 dari pendapatan BMT.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan Mitra untuk pendanaan menunaikan ibadah Haji atau Umrah yang dapat diambil ketika hendak berangkat. Simpanan ini akan mendapat bagi hasil setiap bulannya dengan nisbah 20%:30%, masing-masing untuk Mitra dan BMT dari pendapatan BMT setiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan yang tepat bagi nasabah yang mempersiapkan dana pendidikan di tahun mendatang. Simpanan dapat diambil sewaktu hendak membayar uang sekolah dengan pembagian nisbah 20%:80%, masing-masing untuk Mitra dan BMT dari pendapatan BMT tiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan yang ditujukan bagi nasabah yang bersiap menghadapi Hari Raya Idul Fitri sekaligus merayakan Lebaran bersama keluarga. Nisbah untuk simpanan ini yaitu 20%:80%, masing-masing untuk Mitra dan BMT dari pendapatan BMT tiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan yang diperuntukkan bagi pasangan yang akan melangsungkan pernikahan. Ketentuan nisbah untuk simpanan walimah adalah 20%:80%, masing-masing diberikan kepada Mitra dan BMT dari pendapatan BMT setiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan yang cocok bagi Mitra yang berniat menyelenggarakan Kelahiran, Qurban, atau Aqiqah. Dana dari simpanan ini dapat diambil menjelang melahirkan, Hari Raya Kurban, serta Aqiqah. Nilai pembagiannya yaitu 20%:80%, masing-masing untuk Mitra dan BMT dari pendapatan BMT setiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Qurban -->
                <div class="modal fade" id="modalQurban" tabindex="-1" role="dialog" aria-labelledby="modalQurbanLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalQurbanLabel">Qurban</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan yang cocok bagi Mitra yang berniat menyelenggarakan Kelahiran, Qurban, atau Aqiqah. Dana dari simpanan ini dapat diambil menjelang melahirkan, Hari Raya Kurban, serta Aqiqah. Nilai pembagiannya yaitu 20%:80%, masing-masing untuk Mitra dan BMT dari pendapatan BMT setiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Aqiqah -->
                <div class="modal fade" id="modalAqiqah" tabindex="-1" role="dialog" aria-labelledby="modalAqiqahLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAqiqahLabel">Aqiqah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan yang cocok bagi Mitra yang berniat menyelenggarakan Kelahiran, Qurban, atau Aqiqah. Dana dari simpanan ini dapat diambil menjelang melahirkan, Hari Raya Kurban, serta Aqiqah. Nilai pembagiannya yaitu 20%:80%, masing-masing untuk Mitra dan BMT dari pendapatan BMT setiap bulannya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Simpanan fleksibel yang disesuaikan dengan keinginan Mitra. Ketentuan nisbah antara Mitra dan BMT adalah sebagai berikut:</p>
                                <ul>
                                    <li>Jangka 1 Bulan: Rp 50.000</li>
                                    <li>Jangka 3 Bulan: Rp 55.000</li>
                                    <li>Jangka 6 Bulan: Rp 50.000</li>
                                    <li>Jangka 12 Bulan: Rp 100.000</li>
                                </ul>
                                <p>Untuk simpanan 12 Bulan, bagi hasil yang sudah berjalan setara dengan Rp 10.000 (bahkan lebih) tiap bulannya. Dari simpanan Mitra Rp 10.000.000 akan memperoleh Rp 100.000 per bulan.</p>
                                <p><strong>Bagi hasil bersifat FLUKTUATIF bergantung pada pendapatan BMT setiap bulannya.</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                include 'navigation.php';
                ?>

            </main>
        </div>
    </div>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<!-- Tambahkan Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tambahkan event click pada tombol pushmenu
            $('.nav-link[data-widget="pushmenu"]').on('click', function() {
                // Toggle class 'sidebar-collapse' pada elemen body
                $('body').toggleClass('sidebar-collapse');
            });
        });
    </script>

</body>
</html>