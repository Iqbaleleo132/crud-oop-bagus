<?php
require_once 'siswa.php';

$siswa = new Siswa();
$data_siswa = $siswa->getAllSiswa();

$i = 1;



?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
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

    .siswa-table {
      width: 100%;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 4px;
      overflow: hidden;
    }

    .siswa-table thead th {
      background-color: #f2f2f2;
      padding: 12px 15px;
      font-weight: bold;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .siswa-table tbody td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
    }

    .siswa-table tbody tr:last-child td {
      border-bottom: none;
    }

    .siswa-table tbody tr:hover {
      background-color: #f9f9f9;
    }

    .siswa-table img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
    }

    .siswa-actions {
      display: flex;
      justify-content: center;
      gap: 5px;
    }

    .siswa-actions a {
      padding: 5px 10px;
      text-decoration: none;
      color: #fff;
      background-color: #4caf50;
      border-radius: 4px;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .siswa-actions a:hover {
      background-color: #45a049;
    }

    .add-siswa {
      text-align: center;
      margin-top: 20px;
    }

    .add-siswa a {
      padding: 10px 20px;
      text-decoration: none;
      color: #fff;
      background-color: #3498db;
      border-radius: 4px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .add-siswa a:hover {
      background-color: #2980b9;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Data Siswa</h1>

  <table class="siswa-table">
    <thead>
      <tr>
        <th>ID Siswa</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- Looping untuk menampilkan data siswa -->
      <?php foreach ($siswa->getAllSiswa() as $row) { ?>
        <tr>
        <th scope="row" class="align-middle"><?= $i; ?></th>
          <td><?php echo $row['nama_siswa']; ?></td>
          <td><?php echo $row['kelas']; ?></td>
          <td><img src="<?php echo $row['foto']; ?>"></td>
          <td class="siswa-actions">
            <a href="edit_siswa.php?id=<?php echo $row['id_siswa']; ?>">Edit</a>
            <a href="delete_siswa.php?id=<?php echo $row['id_siswa']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</a>
          </td>
        </tr>
      <?php $i++; } ?>
    </tbody>
  </table>

  <div class="add-siswa">
    <a href="add_siswa.php">Tambah Siswa</a>
  </div>
</body>
</html>
