<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Data Penjualan Obat
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel Obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode Obat</th>
                <th class="center">Nama Obat</th>
                <th class="center">Jumlah Terjual</th>
                <th class="center">Bentuk Obat</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT a.kode_transaksi,a.tanggal_transaksi,a.kode_obat,a.jumlah_terjual,b.kode_obat,b.nama_obat,b.bentuk_obat
                                            FROM transaksi_obat as a INNER JOIN obat as b ON a.kode_obat=b.kode_obat ORDER BY kode_transaksi ASC")
                                            or die('Ada kesalahan pada query tampil Data Obat keluar: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $tanggal         = $data['tanggal_transaksi'];
              $exp             = explode('-',$tanggal);
              $tanggal_transaksi   = $exp[2]."-".$exp[1]."-".$exp[0];

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_transaksi]</td>
                      <td width='80' class='center'>$tanggal_transaksi</td>
                      <td width='80' class='center'>$data[kode_obat]</td>
                      <td width='200'
                      align='center'>$data[nama_obat]</td>
                      <td width='100' align='center'>$data[jumlah_terjual]</td>
                      <td width='80' class='center'>$data[bentuk_obat]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content