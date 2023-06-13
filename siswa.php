<?php
require_once 'config.php';

class Siswa extends Database {
  public function getAllSiswa() {
    try {
      $query = "SELECT * FROM siswa";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function getSiswaById($id) {
    try {
      $query = "SELECT * FROM siswa WHERE id_siswa = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function addSiswa($nama, $kelas, $foto) {
    try {
      $query = "INSERT INTO siswa (nama_siswa, kelas, foto) VALUES (:nama, :kelas, :foto)";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':nama', $nama);
      $stmt->bindParam(':kelas', $kelas);
      $stmt->bindParam(':foto', $foto);
      return $stmt->execute();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function updateSiswa($id, $nama, $kelas, $foto) {
    try {
      $query = "UPDATE siswa SET nama_siswa = :nama, kelas = :kelas, foto = :foto WHERE id_siswa = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':nama', $nama);
      $stmt->bindParam(':kelas', $kelas);
      $stmt->bindParam(':foto', $foto);
      return $stmt->execute();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function deleteSiswa($id) {
    try {
      $query = "DELETE FROM siswa WHERE id_siswa = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
?>
