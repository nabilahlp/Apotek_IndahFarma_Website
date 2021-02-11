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
      <li><a href="?module=obat"> Obat </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/obat/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_obat,6) as kode FROM obat
                                                ORDER BY kode_obat DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_obat : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              

              // buat kode_obat
              
              $kode_obat = "";
              $tgl_produksi = "";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" 
                  placeholder="Masukkan Kode Obat"
                  name="kode_obat" value="<?php echo $kode_obat; ?>" 
                  autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" 
                  placeholder="Masukkan Nama Obat"
                  name="nama_obat" autocomplete="off" required>
                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Jual</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" 
                    placeholder="Masukkan Harga Obat"
                    id="harga_jual" name="harga_jual" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bentuk Obat</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="bentuk_obat" data-placeholder="-- Pilih Bentuk Obat --" 
                  autocomplete="off" required>
                    <option value=""></option>
                    <option value="Salep">Salep</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Kaplet">Kaplet</option>
                    <option value="Tablet">Tablet</option>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Produksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control"
                  placeholder="Masukkan Tanggal Produksi"
                   data-date-format="yyyy-mm-dd" name="tgl_produksi" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control"
                  placeholder="Masukkan Tanggal Kadaluarsa" data-date-format="yyyy-mm-dd" name="tgl_kadaluarsa" autocomplete="off" required>
                </div>
              </div>


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat" class="btn btn-default btn-reset">Batal</a>
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
      $query = mysqli_query($mysqli, "SELECT kode_obat,nama_obat, harga_jual,bentuk_obat, tgl_produksi, tgl_kadaluarsa FROM obat WHERE kode_obat='$_GET[id]'") 
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
      <li><a href="?module=obat"> Obat </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/obat/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_obat" value="<?php echo $data['kode_obat']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_obat" autocomplete="off" value="<?php echo $data['nama_obat']; ?>" required>
                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 control-label">Bentuk Obat</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="bentuk_obat" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value="<?php echo $data['bentuk_obat']; ?>"><?php echo $data['bentuk_obat']; ?><option value=""></option>
                    <option value="Salep">Salep</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Kaplet">Kaplet</option>
                    <option value="Tablet">Tablet</option>
                  </select>
                </div>

              
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Jual</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($data['harga_jual']); ?>" required>
                  </div>
                </div>

                </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Produksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control "
                    data-date-format="yyyy-mm-dd" name="tgl_produksi" autocomplete="off" 
                     value="<?php echo date
                     ($data['tgl_produksi']); ?>" required>
                </div>

                </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control"
                    data-date-format="yyyy-mm-dd" name="tgl_kadaluarsa" autocomplete="off" 
                    value="<?php echo date
                     ($data['tgl_kadaluarsa']); ?>" required>
                </div>
                

              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat" class="btn btn-default btn-reset">Batal</a>
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