<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';
include_once '../models/m_pengarang.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$author = new Pengarang($connection);

$data = json_decode(file_get_contents("php://input"));

$author->id = $_GET['idPengarang'];
$author->nama = $data->nama;
$author->alamat = $data->alamat;
$author->email = $data->email;

if ($author->update()) {
    echo '{';
        echo '"message": "Pengarang berhasil diubah."';
    echo '}';
}
else {
    echo '{';
        echo '"message": "Gagal mengubah data pengarang."';
    echo '}';
}
