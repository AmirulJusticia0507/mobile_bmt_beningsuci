<?php
include '../konekke_local.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_rek = $_POST['no_rek'];

    // Prepare and bind
    $stmt = $koneklocalhost->prepare("SELECT id, no_rek, nama_nasabah, jenis_kelamin, alamat, tgl_mulai, saldo_akhir, kolektor FROM tabungannasabah WHERE no_rek = ?");
    $stmt->bind_param("s", $no_rek);

    // Execute statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($id, $no_rek, $nama_nasabah, $jenis_kelamin, $alamat, $tgl_mulai, $saldo_akhir, $kolektor);

    // Fetch value
    if ($stmt->fetch()) {
        $response = [
            "no_rek" => $no_rek,
            "nama_nasabah" => $nama_nasabah,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat" => $alamat,
            "tgl_mulai" => $tgl_mulai,
            "saldo_akhir" => $saldo_akhir,
            "kolektor" => $kolektor
        ];
    } else {
        $response = ["error" => "No Rekening tidak ditemukan."];
    }

    // Close statement
    $stmt->close();
}

// Close connection
$koneklocalhost->close();

echo json_encode($response);
?>
