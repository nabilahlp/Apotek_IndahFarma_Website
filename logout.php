<!-- 
  Kelompok 5 PSBD
    1910512007  Nabilah Luthfiana Putri
    1910512036  Alifia Laksita Maheswari
    1910512094  Vira Febrita Lukdayanti
    1910512095  Sheren Clever Cantika
 -->
 
<?php
session_start();
// hapus session
session_destroy();

// alihkan ke halaman login (index.php) dan berikan alert = 2
header('Location: index.php?alert=2');
?>