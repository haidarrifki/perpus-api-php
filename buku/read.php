<?php

include_once '../error.php';

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../models/m_buku.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$book = new Buku($connection);

$stmt = $book->read();
$count = $stmt->rowCount();

if($count > 0){


    $books = array();
    $books["body"] = array();
    $books["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id" => $id,
              "judul" => $judul,
              "pengarang" => $pengarang
        );

        array_push($books["body"], $p);
    }

    echo json_encode($books);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}