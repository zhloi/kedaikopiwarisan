<?php
    include("sambungan.php");
    include("jurujual_menu.php");

    $idpelanggan = $_GET["idpelanggan"];

    $sql = "delete from pelanggan where idpelanggan = '$idpelanggan' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='pelanggan_senarai.php'</script>";
?>