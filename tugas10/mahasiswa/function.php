<?php
function koneksi()
{
  return  mysqli_connect("localhost", "root", "", "yanna-unpas");
}
function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function simpan($data)
{
  $conn = koneksi();
  //var_dump($data);
  $nrp = htmlentities($data['nrp']);
  $nama = htmlentities($data['nama']);
  $jurusan = htmlentities($data['jurusan']);
  // var_dump($jurusan);
  $query = "INSERT into mahasiswa (nrp,nama,jurusan)values('$nrp','$nama','$jurusan')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
