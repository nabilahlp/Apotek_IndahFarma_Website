<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->

<script type="text/javascript">
  function tampil_obat(input){
    var num = input.value;

    $.post("modules/obat-keluar/obat.php", {
      dataidobat: num,
    }, function(response) {      
      $('#jumlah_sedia').html(response)

      document.getElementById('jumlah_terjual').focus();
    });
  }

  function cek_jumlah_terjual(input) {
    jml = document.formObatKeluar.jumlah_terjual.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah keluar Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_jumlah_sedia() {
    bil1 = document.formObatKeluar.jumlah_sedia.value;
    bil2 = document.formObatKeluar.jumlah_terjual.value;

    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var hasil = eval(bil1) - eval(bil2);
    }

    document.formObatKeluar.total_jumlah_sedia.value = (hasil);
  }
</script>

<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Penjualan Obat
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=obat_keluar"> Penjualan Obat </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/obat-keluar/proses.php?act=insert" method="POST" name="formObatKeluar">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat kode transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi,3) as kode FROM transaksi_obat
                                                ORDER BY kode_transaksi DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_transaksi
              $buat_id        = str_pad($kode, 3, "0", STR_PAD_LEFT);
              $kode_transaksi = "T-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_transaksi" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

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
              
              <span id='jumlah_sedia'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Sedia</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_sedia" name="jumlah_sedia" readonly required>
                </div>
              </div>
              </span>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Terjual</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_terjual" name="jumlah_terjual" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_jumlah_sedia(this)&cek_jumlah_terjual(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Total Jumlah Sedia</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="total_jumlah_sedia" name="total_jumlah_sedia" readonly required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat_keluar" class="btn btn-default btn-reset">Batal</a>
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