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
function hapus($id)
{
  $conn = koneksi();
  $query = "delete from mahasiswa where id ='$id'";
  mysqli_query($conn, $query) or die(mysqli_error($query));
  return mysqli_affected_rows($conn);
}
function update($data)
{
  $conn = koneksi();
  //var_dump($data);
  $id = $data['id'];
  $nrp = htmlentities($data['nrp']);
  $nama = htmlentities($data['nama']);
  $jurusan = htmlentities($data['jurusan']);
  // var_dump($jurusan);
  $query = "update  mahasiswa set nrp='$nrp',nama='$nama',jurusan='$jurusan' where id ='$id'";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
function cari($keyword)
{
  $conn = koneksi();
  $query = "Select * from mahasiswa where nama like'%$keyword%'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
