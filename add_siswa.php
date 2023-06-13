<?php
require_once 'siswa.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // Proses unggah foto
    $target_dir = "uploads/";  // Folder tempat menyimpan foto
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);  // Path lengkap file foto yang diunggah
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file foto adalah gambar
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }




    // Batasi ukuran file foto
    if ($_FILES["foto"]["size"] > 200000) {
        echo "Ukuran file foto terlalu besar.";
        $uploadOk = 0;
    }

    // Hanya izinkan beberapa format file foto
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Format file foto tidak didukung.";
        $uploadOk = 0;
    }

    // Jika tidak ada masalah dengan file foto, lanjutkan proses penyimpanan
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $foto = $target_file;

            $siswa = new Siswa();
            $result = $siswa->addSiswa($nama, $kelas, $foto);

            if ($result) {
                header("Location: index.php");
                exit();
            } else {
                echo "Gagal menambahkan data siswa.";
            }
        } else {
            echo "Gagal mengunggah file foto.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Siswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input[type="text"], input[type="file"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 12px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 16px;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Tambah Siswa</h1>
  <form method="POST" enctype="multipart/form-data">
    <label for="nama">Nama Siswa:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas" required>

    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" required>

    <button type="submit">Tambah</button>
</form>

</body>
</html>
