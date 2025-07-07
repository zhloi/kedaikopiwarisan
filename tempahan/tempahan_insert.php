<?php
    include("sambungan.php");

    $idpelanggan = $_POST["idpelanggan"];
    $idmakanan = $_POST["idmakanan"];
    $bilangan = $_POST["bilangan"];
   
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date('Y-m-d');
    
    $sql = "insert into tempahan values('$idpelanggan', '$idmakanan', '$today', $bilangan)";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<script>alert('Makanan berjaya ditempah')</script>";
    else
        echo "<script>alert('Makanan sudah ditempah...Klik tempahan')</script>";

    echo "<script>window.location='index.php'</script>";
?>