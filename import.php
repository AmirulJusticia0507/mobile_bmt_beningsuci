<?php
require 'vendor/autoload.php';
require 'konekke_local.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

if (isset($_FILES['file'])) {
    $file_mimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );

    if (in_array($_FILES['file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new Csv();
        } else {
            $reader = new Xlsx();
        }

        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Mulai dari baris kedua (baris pertama adalah header)
        for ($i = 1; $i < count($sheetData); $i++) {
            $no_rek = $sheetData[$i][0];
            $nama_nasabah = $sheetData[$i][1];
            $jenis_kelamin = $sheetData[$i][2];
            $alamat = $sheetData[$i][3];
            $tgl_mulai = date('d-m-Y', strtotime($sheetData[$i][4])); // konversi tanggal
            $saldo_akhir = $sheetData[$i][5];
            $kolektor = $sheetData[$i][6];

            $sql = "INSERT INTO tabungannasabah (no_rek, nama_nasabah, jenis_kelamin, alamat, tgl_mulai, saldo_akhir, kolektor) VALUES ('$no_rek', '$nama_nasabah', '$jenis_kelamin', '$alamat', '$tgl_mulai', '$saldo_akhir', '$kolektor')";
            $koneklocalhost->query($sql);
        }
        echo "Data berhasil diimport!";
    } else {
        echo "Harap upload file yang valid!";
    }
}
?>
