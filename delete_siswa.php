<?php
require_once 'siswa.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $siswa = new Siswa();
  $result = $siswa->deleteSiswa($id);

  if ($result) {
    header("Location: index.php");
    exit();
  } else {
    echo "Gagal menghapus data siswa.";
  }
} else {
  echo "ID siswa tidak ditemukan.";
}
?>
