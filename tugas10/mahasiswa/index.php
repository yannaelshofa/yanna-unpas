<?php


//var_dump($query);
require "function.php";
$mahasiswa = query("select * from mahasiswa");
//var_dump($rows);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <a href="tambah.php">Tambah Data</a>

  <br>
  <br>
  <table border="1">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>nrp</th>
      <th>email</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['nrp']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><a href="detail.php?id=<?= $m['id']; ?>">Detail</a>
          |
          <a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm('Apakah Anda Yakin menghapus??')">hapus</a>
          |
          <a href="edit.php?id=<?= $m['id']; ?>" onclick="return confirm('Apakah Anda Yakin Merubah??')">edit</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>