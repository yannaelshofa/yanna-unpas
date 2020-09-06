<?php
require "function.php";
$id = $_GET['id'];
$mahasiswa = query("select * from mahasiswa where id='$id'");
//var_dump($mahasiswa);

?>
<h3>Detail</h3>

<ul>
  <?php foreach ($mahasiswa as $m) : ?>
    <li><?= $m['nama']; ?></li>
    <li><?= $m['jurusan']; ?></li>
  <?php endforeach; ?>
</ul>