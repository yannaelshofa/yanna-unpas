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
function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];
  if ($error == 4) {
    echo "
          <script>
            alert ('Data Gambar  boleh kosong');
          </script>
      ";
    return false;
  }
  // cek ektensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  //var_dump($ekstensi_file);
  //die();
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "
          <script>
            alert ('Salah type gambar jpg');
          </script>
      ";
    return false;
  }
  // cek ekstensi 2
  if ($tipe_file != 'image/jpeg' &&  $tipe_file != 'image/png') {
    echo "
    <script>
      alert ('Salah type gambar ok');
    </script>
";
    return false;
  }
  if ($ukuran_file > 20000000) {
    echo "
    <script>
      alert ('Data Terlalu besar');
    </script>
";
    return false;
  }
  // pindaah data
  move_uploaded_file($tmp_file, '/img' . $nama_file);
  return $nama_file;

  //var_dump($tmp_file);
  //die();
}
function simpan($data)
{
  $conn = koneksi();
  //var_dump($data);

  $nrp = htmlentities($data['nrp']);
  $nama = htmlentities($data['nama']);
  $jurusan = htmlentities($data['jurusan']);
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  // var_dump($jurusan);

  $query = "INSERT into mahasiswa (nrp,nama,jurusan,gambar)values('$nrp','$nama','$jurusan','$gambar')";
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
