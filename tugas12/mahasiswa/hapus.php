<?php
require "function.php";
$id = $_GET['id'];
if (hapus($id) > 0) {
  echo "
    <script>
      alert('Data Sudah Dihapus');
      document.location.href='index.php';
    </script>
  ";
} else { {
    echo "
      <script>
        alert('Data Tidak berhasil Dihapus');
        document.location.href='index.php';
      </script>
    ";
  }
}
