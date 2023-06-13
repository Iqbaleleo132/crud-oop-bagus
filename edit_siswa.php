<?php
require_once 'siswa.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $siswa = new Siswa();
  $data_siswa = $siswa->getSiswaById($id);

  if (!$data_siswa) {
    echo "Data siswa tidak ditemukan.";
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $foto = $_POST['foto'];

    $result = $siswa->updateSiswa($id, $nama, $kelas, $foto);

    if ($result) {
      header("Location: index.php");
      exit();
    } else {
      echo "Gagal mengupdate data siswa.";
    }
  }
} else {
  echo "ID siswa tidak ditemukan.";
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Siswa</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Edit Siswa</h1>

  <form method="POST">
    <label for="nama">Nama Siswa:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $data_siswa['nama_siswa']; ?>" required>

    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas" value="<?php echo $data_siswa['kelas']; ?>" required>

    <label for="foto">Foto:</label>
    <input type="text" id="foto" name="foto" value="<?php echo $data_siswa['foto']; ?>" required>

    <button type="submit">Update</button>
  </form>
</body>
</html>
