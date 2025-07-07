<?php
    include("sambungan.php");
    include("jurujual_menu.php");

	if (isset($_POST["submit"])) {
        $idpelanggan = $_POST["idpelanggan"];
		$katalaluan = $_POST["katalaluan"];
		$namapelanggan = $_POST["namapelanggan"];

		$sql = "update pelanggan 
                set katalaluan = '$katalaluan', namapelanggan = '$namapelanggan' 
                where idpelanggan = '$idpelanggan'";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "
    <script>
        setTimeout(function() {
            window.location.href = 'pelanggan_senarai.php';
        }, 1000);
    </script>
    <div style='text-align:center; margin-top:20px;'>
        <h4>Berjaya dikemaskini. Anda akan dialihkan...</h4>
    </div>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}

    if (isset($_GET["idpelanggan"]))
		$idpelanggan = $_GET["idpelanggan"];

	$sql = "select * from pelanggan where idpelanggan = '$idpelanggan' ";
	$result = mysqli_query($sambungan, $sql);
	while($pelanggan = mysqli_fetch_array($result)) {
		$namapelanggan = $pelanggan["namapelanggan"];
		$katalaluan = $pelanggan["katalaluan"];
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PELANGGAN</h3>
<form class="panjang" action="pelanggan_update_admin.php" method="post">
    <table>
        <tr>
            <td>ID Pelanggan</td>
            <td><input type="text" name="idpelanggan" value="<?php echo $idpelanggan; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="namapelanggan" value="<?php echo $namapelanggan; ?>"></td>
        </tr>
        <tr>
            <td>Kata Laluan</td>
            <td><input type="text" name="katalaluan" value="<?php echo $katalaluan; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Kemaskini</button>
</form>