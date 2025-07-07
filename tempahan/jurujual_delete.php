<?php
    include("sambungan.php");
    include("jurujual_menu.php");

    $idjurujual = $_GET["idjurujual"];

    $sql = "delete from jurujual where idjurujual = '$idjurujual' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='jurujual_senarai.php'</script>";
?>