<h4>Data Buku</h4>

<?php 
    foreach($detail->result() as $rows) :
        echo $rows->id_buku; echo "<br>";
        echo $rows->judul_buku; echo "<br>";
        echo $rows->stok_buku; echo "<br>";
    endforeach
?>