<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->

<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat</a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat</a>
      </li>
  <?php
  }

  // jika menu data stok dipilih, menu data obat aktif
  if ($_GET["module"]=="persediaan" || $_GET["module"]=="form_persediaan") { ?>
    <li class="active">
      <a href="?module=persediaan"><i class="fa fa-folder"></i> Data Persediaan Obat</a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=persediaan"><i class="fa fa-folder"></i> Data Persediaan Obat</a>
      </li>
  <?php
  }



  // jika menu data obat keluar dipilih, menu data obat keluar aktif
  if ($_GET["module"]=="obat_keluar" || $_GET["module"]=="form_obat_keluar") { ?>
    <li class="active">
      <a href="?module=obat_keluar"><i class="fa fa-clone"></i> Data Penjualan Obat </a>
      </li>
  <?php
  }
  // jika tidak, menu data obat keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=obat_keluar"><i class="fa fa-clone"></i> Data Penjualan Obat </a>
      </li>
  <?php
  }

	// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
	if ($_GET["module"]=="lap_stok") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
        		<li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Penjualan Obat </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
	elseif ($_GET["module"]=="lap_obat_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
        		<li class="active"><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Penjualan Obat </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
        		<li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Penjualan Obat </a></li>
      		</ul>
    	</li>
    <?php
	}






	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = EndUser, tampilkan menu
elseif ($_SESSION['hak_akses']=='EndUser') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="berandauser") { ?>
		<li class="active">
			<a href="?module=berandauser"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=berandauser"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="obatuser") { ?>
    <li class="active">
      <a href="?module=obatuser"><i class="fa fa-folder"></i> Data Obat</a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=obatuser"><i class="fa fa-folder"></i> Data Obat</a>
      </li>
  <?php
  }

  // jika menu data stok dipilih, menu data obat aktif
  if ($_GET["module"]=="persediaanuser") { ?>
    <li class="active">
      <a href="?module=persediaanuser"><i class="fa fa-folder"></i> Data Persediaan Obat</a>
      </li>
  <?php
  }
  // jika tidak, menu data obat tidak aktif
  else { ?>
    <li>
      <a href="?module=persediaanuser"><i class="fa fa-folder"></i> Data Persediaan Obat</a>
      </li>
  <?php
  }

    // jika menu data obat keluar dipilih, menu data obat keluar aktif
    if ($_GET["module"]=="obatkeluaruser") { ?>
      <li class="active">
        <a href="?module=obatkeluaruser"><i class="fa fa-clone"></i> Data Penjualan Obat </a>
        </li>
    <?php
    }
    // jika tidak, menu data obat keluar tidak aktif
    else { ?>
      <li>
        <a href="?module=obatkeluaruser"><i class="fa fa-clone"></i> Data Penjualan Obat </a>
        </li>
    <?php
    }

	// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Penjualan Obat </a></li>
          </ul>
      </li>
    <?php
  }


	// jika menu ubah password dipilih, menu ubah password aktif

	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
