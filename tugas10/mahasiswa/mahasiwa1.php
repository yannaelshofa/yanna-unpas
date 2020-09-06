<?php
$conn = mysqli_connect("localhost", "root", "", "yanna-unpas");
$query = mysqli_query($conn, "select * from mahasiswa");
//var_dump($query);
$rows = [];
while ($result = mysqli_fetch_assoc($query)) {
  $rows[] = $result;
}
$mahasiswa = $rows;
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
  <table border="1">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>nrp</th>
      <th>email</th>
    </tr>
    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['nrp']; ?></td>
        <td><?= $m['email']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>