<?php
    include("sambungan.php");

    $idmakanan = $_GET["idmakanan"];

    $sql = "delete from makanan where idmakanan = '$idmakanan' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='makanan_senarai.php'</script>";
?>