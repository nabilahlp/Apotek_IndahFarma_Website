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

if(isset($_POST['dataidobat'])) {
	$kode_obat = $_POST['dataidobat'];

  // fungsi query untuk menampilkan data dari tabel obat
  $query = mysqli_query($mysqli, "SELECT kode_obat, jumlah_sedia FROM persediaan WHERE kode_obat='$kode_obat'")
                                  or die('Ada kesalahan pada query tampil data obat: '.mysqli_error($mysqli));

  // tampilkan data
  $data = mysqli_fetch_assoc($query);

  $jumlah_sedia  = $data['jumlah_sedia'];
 

	if($jumlah_sedia != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Jumlah Sedia</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='jumlah_sedia' name='jumlah_sedia' value='$jumlah_sedia' readonly>
                   
                  </div>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>jumlah_sedia</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='jumlah_sedia' name='jumlah_sedia' value='jumlah_sedia obat tidak ditemukan' readonly>
                    <span class='input-group-addon'>bentuk_obat obat tidak ditemukan</span>
                  </div>
                </div>
              </div>";
	}		
}
?> 