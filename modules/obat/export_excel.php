<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->


<?php 


 //header info for browser
 header("Content-Type: application/vnd-ms-excel"); 
    header('Content-Disposition: attachment; filename="data obat.xls";');

    //menampilkan data sebagai array dari tabel produk
    $out=array();
 $sql=mysql_query("SELECT * FROM obat");
 while($data=mysql_fetch_assoc($sql)) $out[]=$data;

 $show_coloumn = false;
 foreach($out as $record) {
 if(!$show_coloumn) {
 //menampilkan nama kolom di baris pertama
 echo implode("\t", array_keys($record)) . "\n";
 $show_coloumn = true;
 }
 // looping data dari database
 echo implode("\t", array_values($record)) . "\n";
 } 
 exit;
?>