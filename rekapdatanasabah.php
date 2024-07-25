<?php
include 'konekke_local.php';

// Periksa apakah pengguna telah terautentikasi
session_start();
if (!isset($_SESSION['userid'])) {
    // Jika tidak ada sesi pengguna, alihkan ke halaman login
    header('Location: login.php');
    exit;
}


// Jika ada permintaan POST untuk menambah, mengedit, atau menghapus data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $id = $_POST['id'] ?? null;
        $no_rek = $_POST['no_rek'] ?? '';
        $nama_nasabah = $_POST['nama_nasabah'] ?? '';
        $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $tgl_mulai = $_POST['tgl_mulai'] ?? '';
        $saldo_akhir = $_POST['saldo_akhir'] ?? '';
        $kolektor = $_POST['kolektor'] ?? '';

        if ($action == 'create') {
            $stmt = $koneklocalhost->prepare("INSERT INTO tabungannasabah (no_rek, nama_nasabah, jenis_kelamin, alamat, tgl_mulai, saldo_akhir, kolektor) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssss', $no_rek, $nama_nasabah, $jenis_kelamin, $alamat, $tgl_mulai, $saldo_akhir, $kolektor);
            $stmt->execute();
        } elseif ($action == 'edit') {
            $stmt = $koneklocalhost->prepare("UPDATE tabungannasabah SET no_rek = ?, nama_nasabah = ?, jenis_kelamin = ?, alamat = ?, tgl_mulai = ?, saldo_akhir = ?, kolektor = ? WHERE id = ?");
            $stmt->bind_param('sssssssi', $no_rek, $nama_nasabah, $jenis_kelamin, $alamat, $tgl_mulai, $saldo_akhir, $kolektor, $id);
            $stmt->execute();
        } elseif ($action == 'delete') {
            $stmt = $koneklocalhost->prepare("DELETE FROM tabungannasabah WHERE id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
        }
        header('Location: rekapdatanasabah.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - SITABUNG BMT BENING SUCI</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan link AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Tambahkan link DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="checkbox.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cleave.js/dist/addons/cleave-phone.id.css">
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
        .upload-container {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
        }
        .upload-icon {
            font-size: 3rem;
            color: #007bff;
        }
        .upload-text {
            margin-top: 10px;
            font-size: 1.25rem;
            color: #6c757d;
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
                        <li class="breadcrumb-item active" aria-current="page">Rekap Data Nasabah</li>
                    </ol>
                </nav>
                <?php
                include 'navigation.php';
                ?>

                <div class="container-fluid">
                    <h1>Rekap Data Nasabah</h1><br>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="upload-container">
                                <i class="bi bi-upload upload-icon"></i>
                                <div class="upload-text">Drag and drop your Excel/CSV file here or click to upload</div>
                                <form action="import.php" method="POST" enctype="multipart/form-data" class="mt-3">
                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control-file" id="file" accept=".csv, .xlsx, .xls" required>
                                    </div>
                                    <button type="submit" class="btn btn-info mt-3"><i class="fas fa-upload"></i> Import</button>
                                </form>
                            </div>
                        </div>
                    </div><br><br><hr><br>

                    <button class="myButtonCekSaldo mb-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-plus"></i> Tambah Data</button><br><br>
                    
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Data Nasabah</h5>
                        </div>
                        <div class="card-body">
                            <!-- Tabel DataNasabah -->
                            <table id="dataNasabahTable" class="table table-bordered table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="text-align:center; white-space: normal;">No Rekening</th>
                                        <th>Nama Nasabah</th>
                                        <th style="text-align:center; white-space: normal;">Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Saldo Akhir</th>
                                        <th>Kolektor</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'konekke_local.php';
                                    $sql = "SELECT * FROM tabungannasabah";
                                    $nomorUrutTerakhir = 1;
                                    $result = $koneklocalhost->query($sql);

                                    function formatRupiah($angka) {
                                        $angka = floatval(str_replace(',', '.', str_replace('.', '', $angka))); // Convert string to float
                                        return 'Rp ' . number_format($angka, 0, ',', '.');
                                    }

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td style='text-align:center; white-space: normal;'>" . $nomorUrutTerakhir . "</td>";
                                            echo "<td>" . $row["no_rek"] . "</td>";
                                            echo "<td>" . $row["nama_nasabah"] . "</td>";
                                            echo "<td style='text-align:center; white-space: normal;'>" . $row["jenis_kelamin"] . "</td>";
                                            echo "<td>" . $row["alamat"] . "</td>";
                                            echo "<td>" . date('d-m-Y', strtotime($row["tgl_mulai"])) . "</td>";
                                            echo "<td>" . formatRupiah($row["saldo_akhir"]) . "</td>";
                                            echo "<td>" . $row["kolektor"] . "</td>";
                                            echo '<td nowrap>
                                                <button class="btn btn-warning btn-sm edit-btn" title="Edit Data Nasabah" data-id="' . $row["id"] . '" data-no_rek="' . $row["no_rek"] . '" data-nama_nasabah="' . $row["nama_nasabah"] . '" data-jenis_kelamin="' . $row["jenis_kelamin"] . '" data-alamat="' . $row["alamat"] . '" data-tgl_mulai="' . $row["tgl_mulai"] . '" data-saldo_akhir="' . $row["saldo_akhir"] . '" data-kolektor="' . $row["kolektor"] . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-danger btn-sm delete-btn" title="Hapus Data Nasabah" data-id="' . $row["id"] . '" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                                <button class="btn btn-info btn-sm details-btn" title="Lihat Detail Data Nasabah" data-id="' . $row["id"] . '" data-bs-toggle="modal" data-bs-target="#detailsModal">
                                                    <i class="fas fa-eye"></i> Details
                                                </button>
                                            </td>';
                                            $nomorUrutTerakhir++;
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>Tidak ada data nasabah</td></tr>";
                                    }
                                    $koneklocalhost->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Nasabah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm">
                        <div class="mb-3">
                            <label for="create_no_rek" class="form-label">No Rekening</label>
                            <input type="text" id="create_no_rek" name="no_rek" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_nama_nasabah" class="form-label">Nama Nasabah</label>
                            <input type="text" id="create_nama_nasabah" name="nama_nasabah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="create_jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="create_alamat" class="form-label">Alamat</label>
                            <textarea id="create_alamat" name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="create_tgl_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" id="create_tgl_mulai" name="tgl_mulai" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_saldo_akhir" class="form-label">Saldo Akhir</label>
                            <input type="number" id="create_saldo_akhir" name="saldo_akhir" class="form-control" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_kolektor" class="form-label">Kolektor</label>
                            <input type="text" id="create_kolektor" name="kolektor" class="form-control" required>
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Simpan Data</button>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-power-off"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Nasabah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="mb-3">
                            <label for="edit_no_rek" class="form-label">No Rekening</label>
                            <input type="text" id="edit_no_rek" name="no_rek" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_nasabah" class="form-label">Nama Nasabah</label>
                            <input type="text" id="edit_nama_nasabah" name="nama_nasabah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="edit_jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_alamat" class="form-label">Alamat</label>
                            <textarea id="edit_alamat" name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tgl_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" id="edit_tgl_mulai" name="tgl_mulai" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_saldo_akhir" class="form-label">Saldo Akhir</label>
                            <input type="number" id="edit_saldo_akhir" name="saldo_akhir" class="form-control" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_kolektor" class="form-label">Kolektor</label>
                            <input type="text" id="edit_kolektor" name="kolektor" class="form-control" required>
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-power-off"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Nasabah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data nasabah ini?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" id="delete_id" name="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Detail Data Nasabah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">ID:</dt>
                        <dd class="col-sm-8" id="details_id"></dd>
                        <dt class="col-sm-4">No Rekening:</dt>
                        <dd class="col-sm-8" id="details_no_rek"></dd>
                        <dt class="col-sm-4">Nama Nasabah:</dt>
                        <dd class="col-sm-8" id="details_nama_nasabah"></dd>
                        <dt class="col-sm-4">Jenis Kelamin:</dt>
                        <dd class="col-sm-8" id="details_jenis_kelamin"></dd>
                        <dt class="col-sm-4">Alamat:</dt>
                        <dd class="col-sm-8" id="details_alamat"></dd>
                        <dt class="col-sm-4">Tanggal Mulai:</dt>
                        <dd class="col-sm-8" id="details_tgl_mulai"></dd>
                        <dt class="col-sm-4">Saldo Akhir:</dt>
                        <dd class="col-sm-8" id="details_saldo_akhir"></dd>
                        <dt class="col-sm-4">Kolektor:</dt>
                        <dd class="col-sm-8" id="details_kolektor"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>


<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
<!-- Tambahkan Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tambahkan event click pada tombol pushmenu
            $('.nav-link[data-widget="pushmenu"]').on('click', function() {
                // Toggle class 'sidebar-collapse' pada elemen body
                $('body').toggleClass('sidebar-collapse');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#dataNasabahTable').DataTable();

            // Handle Edit Button Click
            $('#dataNasabahTable').on('click', '.edit-btn', function() {
                var row = $(this).closest('tr');
                var id = $(this).data('id');
                var data = row.children('td').map(function() { return $(this).text(); }).get();

                // Convert date format from dd-mm-yyyy to yyyy-mm-dd
                function convertDateToInputFormat(dateStr) {
                    var parts = dateStr.split('-'); // Split the date string
                    return parts[2] + '-' + parts[1] + '-' + parts[0]; // Return as yyyy-mm-dd
                }

                // Set form values from table data
                $('#edit_id').val(id);
                $('#edit_no_rek').val(data[1]);
                $('#edit_nama_nasabah').val(data[2]);
                $('#edit_jenis_kelamin').val(data[3]).change();
                $('#edit_alamat').val(data[4]);
                $('#edit_tgl_mulai').val(convertDateToInputFormat(data[5]));
                $('#edit_saldo_akhir').val(data[6].replace('Rp ', '').replace(/\./g, '')); // Remove 'Rp ' and format
                $('#edit_kolektor').val(data[7]);

                $('#editModal').modal('show');
            });

            // Handle Details Button Click
            $('#dataNasabahTable').on('click', '.details-btn', function() {
                var row = $(this).closest('tr');
                var id = $(this).data('id');
                var data = row.children('td').map(function() { return $(this).text(); }).get();

                // Set detail values in the modal
                $('#details_id').text(id);
                $('#details_no_rek').text(data[1]);
                $('#details_nama_nasabah').text(data[2]);
                $('#details_jenis_kelamin').text(data[3]);
                $('#details_alamat').text(data[4]);
                $('#details_tgl_mulai').text(data[5]);
                $('#details_saldo_akhir').text(data[6]);
                $('#details_kolektor').text(data[7]);

                $('#detailsModal').modal('show');
            });

            // Handle Edit Form Submission with SweetAlert confirmation
            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Anda yakin ingin mengubah data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Ubah!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('rekapdatanasabah.php', $(this).serialize() + '&action=edit', function(response) {
                            $('#editModal').modal('hide');
                            table.ajax.reload();
                            Swal.fire('Berhasil', 'Data berhasil diubah.', 'success');
                        });
                    }
                });
            });

            // Handle Delete Button Click
            $('#dataNasabahTable').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                $('#delete_id').val(id);
                $('#deleteModal').modal('show');
            });

            // Handle Delete Form Submission with SweetAlert confirmation
            $('#deleteForm').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Anda yakin ingin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('rekapdatanasabah.php', $(this).serialize(), function(response) {
                            $('#deleteModal').modal('hide');
                            table.ajax.reload();
                            Swal.fire('Berhasil', 'Data berhasil dihapus.', 'success');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>