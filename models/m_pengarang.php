<?php
class Pengarang{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "pengarang";

    // table columns
    public $id;
    public $nama;
    public $alamat;
    public $email;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {
        $query = "INSERT INTO pengarang (nama, alamat, email) VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($query);

        $stmt->execute([$this->nama, $this->alamat, $this->email]);

        return true;
    }
    //R
    public function read() {
        $query = "SELECT id, nama, alamat, email FROM $this->table_name";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update() {
        $query = "UPDATE $this->table_name SET nama = ?, alamat = ?, email = ? WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->execute([$this->nama, $this->alamat, $this->email, $this->id]);

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