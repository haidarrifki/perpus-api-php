<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';
include_once '../models/m_buku.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$book = new Buku($connection);

$data = json_decode(file_get_contents("php://input"));

$book->id = $_GET['idBuku'];
$book->judul = $data->judul;
$book->pengarang = $data->pengarang;

if ($book->update()) {
    echo '{';
        echo '"message": "Buku berhasil diubah."';
    echo '}';
}
else {
    echo '{';
        echo '"message": "Gagal mengubah data buku."';
    echo '}';
}
