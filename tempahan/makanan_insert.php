<?php
	include("sambungan.php");
	include("jurujual_menu.php");

	if (isset($_POST["submit"])) {
		$idmakanan = $_POST["idmakanan"];
        $namamakanan = $_POST["namamakanan"];
		$harga = $_POST["harga"];
        $idjurujual = $_POST["idjurujual"];
        
        $namafail = $idmakanan.".png";
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara, "imej/".basename($namafail));
        
		$sql = "insert into makanan values('$idmakanan', '$namamakanan', '$namafail', $harga, '$idjurujual')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya tambah</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">BORANG TAMBAH MAKANAN</h3>
<form class="panjang" action="makanan_insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
           <td>ID Makanan</td>
           <td><input required type="text" 
            name="idmakanan" placeholder="cth: M01"  
            pattern="[A-Z0-9]{3}" 
            oninvalid="this.setCustomValidity('Sila masukkan 3 aksara')" 
            oninput="this.setCustomValidity('')"
            <?php  
                       $sql = "SELECT * FROM makanan ORDER BY idmakanan DESC LIMIT 1";
                       $result = mysqli_query($sambungan, $sql);
                       $bilrekod = mysqli_num_rows($result);
                       if ($bilrekod > 0) { 
                   		   $makanan = mysqli_fetch_array($result);
                   		   $idmakanan = ++$makanan["idmakanan"];
		              }
		              else
			             $idmakanan = "M01";
		              echo "value = '$idmakanan'";                    
                   
            ?>
            readonly></td>
        </tr>
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="namamakanan" placeholder="cth: Mee Goreng"></td>
        </tr>
        <tr>
            <td>Gambar 350x320</td>
            <td><input required type="file" name="namafail" accept=".png, .jpg" id="file-upload" style="display: none;" onchange="updateFileName()">
                <label for="file-upload" class="custom-file-upload">Pilih Fail</label>
                <span id="file-name" class="white-span">Tiada fail dipilih</span></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" placeholder="cth: RM2.00"></td>
        </tr>
        <tr>
            <td>Jurujual</td>
            <td>
                <select name="idjurujual">
                <?php
                    $sql = "select * from jurujual";
                    $data = mysqli_query($sambungan, $sql);
                    while($jurujual = mysqli_fetch_array($data)){
                    echo "<option value='$jurujual[idjurujual]'>$jurujual[namajurujual]</option>";
                    }
                ?>
                </select>
            </td>
        </tr>     
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

<script>
function updateFileName() {
    const fileInput = document.getElementById('file-upload');
    const fileNameDisplay = document.getElementById('file-name');
    fileNameDisplay.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : 'Tiada fail dipilih';
}
</script>