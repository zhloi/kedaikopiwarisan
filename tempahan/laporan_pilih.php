<?php
    include("sambungan.php");
	include("jurujual_menu.php");
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<main>
<h3 class="pendek">PILIH JENIS LAPORAN</h3>

<form class="pendek" action="laporan_cetak.php" method="post">

    <select id='pilih' name='pilih' onchange='papar_pilihan()'>
        <option value="1">Tempahan Mengikut Tarikh</option>
        <option value="2">Tempahan Mengikut Pelanggan</option>
    </select>

    <!-- Pelanggan dropdown (always shown) -->
    <div id="pelanggan">
        <select name="idpelanggan">
            <?php
                $sql = "SELECT * FROM pelanggan";
                $data = mysqli_query($sambungan, $sql);
                while ($pelanggan = mysqli_fetch_array($data)) {
                    echo "<option value='$pelanggan[idpelanggan]'>$pelanggan[namapelanggan]</option>";
                }
            ?>
        </select>
    </div>

    <!-- Tarikh dropdown (shown only when pilih = 1) -->
    <div id="tarikh">
        <select name="tarikh">
            <?php
                $sql = "SELECT * FROM tempahan GROUP BY tarikh ORDER BY tarikh DESC";
                $data = mysqli_query($sambungan, $sql);
                while ($tempahan = mysqli_fetch_array($data)) {
                    echo "<option value='$tempahan[tarikh]'>$tempahan[tarikh]</option>";
                }
            ?>
        </select>
    </div>

    <br>
    <button class="papar" name="submit" type="submit">Papar</button>
</form>
</main>

<script>
    function papar_pilihan() {
        var pilih = document.getElementById("pilih").value;
        var papartarikh = 'none';
        
        if (pilih == 1) {
            papartarikh = 'block';
        } 
        else if (pilih == 2) {
            papartarikh = 'none';
        }
        document.getElementById('tarikh').style.display = papartarikh;
    }
</script>