<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            
            $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));
            $tanggal         = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_transaksi']));
            $exp             = explode('-',$tanggal);
            $tanggal_transaksi   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $kode_obat       = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
            $jumlah_terjual    = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_terjual']));
            $total_jumlah_sedia      = mysqli_real_escape_string($mysqli, trim($_POST['total_jumlah_sedia']));
            
            $created_user    = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat keluar
            $query = mysqli_query($mysqli, "INSERT INTO transaksi_obat(kode_transaksi,tanggal_transaksi,kode_obat,jumlah_terjual,created_user) 
                                            VALUES('$kode_transaksi','$tanggal_transaksi','$kode_obat','$jumlah_terjual','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel obat
                $query1 = mysqli_query($mysqli, "UPDATE persediaan SET jumlah_sedia        = '$total_jumlah_sedia'
                                                              WHERE kode_obat   = '$kode_obat'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query1) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=obat_keluar&alert=1");
                }
            }   
        }   
    }
}       
?>