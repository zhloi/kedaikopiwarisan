<?php
    include("sambungan.php");

    $idmakanan = $_GET["idmakanan"];
    $idpelanggan = $_GET["idpelanggan"];
    $tarikh = $_GET["tarikh"];
    $bilangan = $_GET["bilangan"];;

    $sql = "update tempahan set bilangan = $bilangan 
    where idmakanan = '$idmakanan' and idpelanggan = '$idpelanggan' and tarikh = '$tarikh' ";
    $result = mysqli_query($sambungan, $sql);

    echo "<script>window.location='tempahan_senarai.php'</script>";
?>