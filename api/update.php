<?php 

include "../config/koneksi.php";

$id = @$_POST['id'];
$jenis_kendaraan = @$_POST['jenis_kendaraan'];
$biaya_kendaraan = @$_POST['biaya_kendaraan'];
$tanggal_masuk = @$_POST['tanggal_masuk'];

$data = [];

$query = mysqli_query($conn, "UPDATE `tampilan` 
SET `jenis_kendaraan`='".$jenis_kendaraan."',`biaya_kendaraan`='".$biaya_kendaraan."',`tanggal_masuk`='".$tanggal_masuk.
"' WHERE `id`='".$id."'");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = $query;
} else {
    $status = false;
    $pesan = "request failed";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>
