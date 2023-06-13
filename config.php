<?php
class Database {
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "kelas";
  protected $conn;

  public function __construct() {
    try {
      $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Koneksi database gagal: " . $e->getMessage();
    }
  }
}
?>
