<?php
require 'function.php';
$id = $_GET['id'];
$mahasiswa = query("select * from mahasiswa where id='$id'")[0];
var_dump($mahasiswa);
if (isset($_POST['update'])) {
  //var_dump($_POST);
  if (update($_POST) > 0) {
    echo "
        <script>
        alert('Data Berhasil Disimpan');
        document.location.href='index.php';
        </script>      
    ";
  } else {
    echo "data Tidak Berhasil Disimpan";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data</title>
</head>

<body>
  <h3>Tambah data</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
    <ul>
      <li>
        <label>
          Nrp
          <input type="text" name="nrp" autofocus required value="<?= $mahasiswa['nrp']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nama
          <input type="text" name="nama" value="<?= $mahasiswa['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan
          <input type="text" name="jurusan" value="<?= $mahasiswa['jurusan']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="update">Update</button>
      </li>
    </ul>

  </form>
</body>

</html>