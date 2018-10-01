<?php

include_once '../error.php';

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../models/m_pengarang.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$author = new Pengarang($connection);

$stmt = $author->read();
$count = $stmt->rowCount();

if($count > 0){


    $authors = array();
    $authors["body"] = array();
    $authors["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id" => $id,
              "nama" => $nama,
              "alamat" => $alamat,
              "email" => $email
        );

        array_push($authors["body"], $p);
    }

    echo json_encode($authors);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}