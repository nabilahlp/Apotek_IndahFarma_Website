<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->

<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih obat, panggil file view obat
	elseif ($_GET['module'] == 'obat') {
		include "modules/obat/view.php";
	}

	// jika halaman konten yang dipilih form obat, panggil file form obat
	elseif ($_GET['module'] == 'form_obat') {
		include "modules/obat/form.php";
	}
	// -----------------------------------------------------------------------------

		// jika halaman konten yang dipilih persediaan, panggil file view persediaan
		elseif ($_GET['module'] == 'persediaan') {
			include "modules/persediaan/view.php";
		}
	
		// jika halaman konten yang dipilih form persediaan, panggil file form persediaan
		 elseif ($_GET['module'] == 'form_persediaan') {
			include "modules/persediaan/form.php";
		}
		// 

	// jika halaman konten yang dipilih obat keluar, panggil file view obat keluar
	elseif ($_GET['module'] == 'obat_keluar') {
		include "modules/obat-keluar/view.php";
	}

	// jika halaman konten yang dipilih form obat keluar, panggil file form obat keluar
	elseif ($_GET['module'] == 'form_obat_keluar') {
		include "modules/obat-keluar/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'lap_obat_masuk') {
		include "modules/lap-obat-masuk/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}

		// jika halaman konten yang dipilih obat, panggil file view obat
		elseif ($_GET['module'] == 'obatuser') {
			include "modules/obatuser/view.php";
		}

	// jika halaman konten yang dipilih obat keluar, panggil file view obat keluar
	elseif ($_GET['module'] == 'obatkeluaruser') {
		include "modules/obatkeluaruser/view.php";
	}

		// jika halaman konten yang dipilih persediaan, panggil file view obat keluar
		elseif ($_GET['module'] == 'persediaanuser') {
			include "modules/persediaanuser/view.php";
		}

		// jika halaman konten yang dipilih persediaan, panggil file view obat keluar
		elseif ($_GET['module'] == 'berandauser') {
			include "modules/berandauser/view.php";
		}		
}
?>