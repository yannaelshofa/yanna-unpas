<?php
require 'function.php';
if (isset($_POST['simpan'])) {
  //var_dump($_POST);
  if (simpan($_POST) > 0) {
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
    <ul>
      <li>
        <label>
          Nrp
          <input type="text" name="nrp" autofocus>
        </label>
      </li>
      <li>
        <label>
          Nama
          <input type="text" name="nama">
        </label>
      </li>
      <li>
        <label>
          Jurusan
          <input type="text" name="jurusan">
        </label>
      </li>
      <li>
        <button type="submit" name="simpan">Simpan</button>
      </li>
    </ul>
  </form>
</body>

</html>