<?php
class Buku{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "buku";

    // table columns
    public $id;
    public $judul;
    public $pengarang;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $query = "INSERT INTO $this->table_name (judul, pengarang) VALUES (?, ?)";

        $stmt = $this->connection->prepare($query);

        $stmt->execute([$this->judul, $this->pengarang]);

        return true;
    }
    //R
    public function read() {
        $query = "SELECT id, judul, pengarang FROM $this->table_name";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update() {
        $query = "UPDATE $this->table_name SET judul = ?, pengarang = ? WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->execute([$this->judul, $this->pengarang, $this->id]);

        return true;
    }
    //D
    public function delete() {
        $query = "DELETE FROM $this->table_name WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->execute([$this->id]);

        return true;
    }
}