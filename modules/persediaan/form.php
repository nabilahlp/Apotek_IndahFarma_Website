<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Obat
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=persediaan"> Persediaan Obat </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/persediaan/proses.php?act=insert" method="POST">
            <div class="box-body">

            <div class="form-group">
                <label class="col-sm-2 control-label">Obat</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_obat" data-placeholder="-- Pilih Obat --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM obat ORDER BY nama_obat ASC")
                                                            or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[kode_obat]\"> $data_obat[kode_obat] | $data_obat[nama_obat] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Sedia</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" 
                  placeholder="Masukkan Jumlah Obat"
                  name="jumlah_sedia" autocomplete="off" required>
                </div>
              </div>


 
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=persediaan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel obat
      $query = mysqli_query($mysqli, "SELECT kode_obat, jumlah_sedia FROM persediaan WHERE kode_obat='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data obat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Obat
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=persediaan"> Persediaan Obat </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/persediaan/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" value="<?php echo $data['kode_obat']; ?>" required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Sedia</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jumlah_sedia" autocomplete="off" value="<?php echo $data['jumlah_sedia']; ?>" required>
                </div>
              </div>
                

              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=persediaan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>