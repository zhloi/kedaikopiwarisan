<?php
    include("sambungan.php");
    include("jurujual_menu.php");

	if (isset($_POST["submit"])) {
		$idjurujual = $_POST["idjurujual"];
		$namajurujual = $_POST["namajurujual"];
		$katalaluan = $_POST["katalaluan"];

		$sql = "update jurujual 
                set namajurujual = '$namajurujual', katalaluan = '$katalaluan' 
                where idjurujual = '$idjurujual' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "
    <script>
        setTimeout(function() {
            window.location.href = 'jurujual_senarai.php';
        }, 1000);
    </script>
    <div style='text-align:center; margin-top:20px;'>
        <h4>Berjaya dikemaskini. Anda akan dialihkan...</h4>
    </div>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}

	if (isset($_GET['idjurujual']))
        $idjurujual = $_GET['idjurujual'];

	$sql = "select * from jurujual where idjurujual = '$idjurujual' ";
	$result = mysqli_query($sambungan, $sql);
	while($jurujual = mysqli_fetch_array($result)) {
		$katalaluan = $jurujual['katalaluan'];
		$namajurujual = $jurujual['namajurujual'];
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI JURUJUAL</h3>
<form class="panjang" action="jurujual_update.php" method="post">
    <table>
        <tr>
            <td>ID Jurujual</td>
            <td><input type="text" name="idjurujual" value="<?php echo $idjurujual; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama Jurujual</td>
            <td><input type="text" name="namajurujual" value="<?php echo $namajurujual; ?>" ></td>
        </tr>
        <tr>
            <td>katalaluan</td>
            <td><input type="text" name="katalaluan" value="<?php echo $katalaluan; ?>" ></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Kemaskini</button>
</form>