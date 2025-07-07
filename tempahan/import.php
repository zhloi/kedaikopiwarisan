<?php 
include("sambungan.php"); 
include("jurujual_menu.php");

$importFailed = false;
$importAttempted = false;

if (isset($_POST["submit"])) {
    $namajadual = $_POST["namajadual"];
    $namafail = $_FILES["namafail"]["name"];
    $sementara = $_FILES["namafail"]["tmp_name"];
    move_uploaded_file($sementara, $namafail);

    $fail = fopen($namafail, "r");
    $importAttempted = true;

    while (!feof($fail)) {
        $medan = explode(",", fgets($fail));
        if (count($medan) < 3) continue;

        $berjaya = false;

        if (strtolower($namajadual) === "pelanggan") {
            $idpelanggan = trim($medan[0]);
            $katalaluan = trim($medan[1]);
            $namapelanggan = trim($medan[2]);
            $sql = "INSERT INTO pelanggan VALUES('$idpelanggan', '$namapelanggan', '$katalaluan')";
            $berjaya = mysqli_query($sambungan, $sql);
        }

        if (strtolower($namajadual) === "jurujual") {
            $idjurujual = trim($medan[0]);
            $katalaluan = trim($medan[1]);
            $namajurujual = trim($medan[2]);
            $sql = "INSERT INTO jurujual VALUES('$idjurujual', '$namajurujual', '$katalaluan')";
            $berjaya = mysqli_query($sambungan, $sql);
        }

        if (!$berjaya) {
            $importFailed = true;
        }
    }
    fclose($fail);
}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">IMPORT DATA</h3>
<form class="panjang" action="import.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Jadual</td>
            <td>
                <select name="namajadual" required>
                    <option value="Pelanggan">Pelanggan</option>
                    <option value="Jurujual">Jurujual</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Fail</td>
            <td>
                <input required type="file" name="namafail" accept=".txt, .csv" id="file-upload" style="display: none;" onchange="updateFileName()">
                <label for="file-upload" class="custom-file-upload">Pilih Fail</label>
                <span id="file-name" class="white-span">Tiada fail dipilih</span>
            </td>
        </tr>
    </table>
    <button class="import" type="submit" name="submit">Import</button>
</form>

<!-- Success Modal -->
<div id="customModal2" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal2()">&times;</span>
        <p>Rekod berjaya diimport!</p>
    </div>
</div>

<!-- Error Modal -->
<div id="customModal3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal3()">&times;</span>
        <p>Rekod tidak berjaya diimport!</p>
    </div>
</div>

<script>
function updateFileName() {
    const fileInput = document.getElementById('file-upload');
    const fileNameDisplay = document.getElementById('file-name');
    fileNameDisplay.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : 'Tiada fail dipilih';
}

function success1() {
    document.getElementById("customModal2").style.display = "block";
}

function error1() {
    document.getElementById("customModal3").style.display = "block";
}

function closeModal2() {
    document.getElementById("customModal2").style.display = "none";
}

function closeModal3() {
    document.getElementById("customModal3").style.display = "none";
}

window.onclick = function(event) {
    let modal2 = document.getElementById("customModal2");
    let modal3 = document.getElementById("customModal3");
    if (event.target == modal2) modal2.style.display = "none";
    if (event.target == modal3) modal3.style.display = "none";
};

// Call the appropriate modal based on PHP result
<?php if ($importAttempted): ?>
    <?php if ($importFailed): ?>
        error1();
    <?php else: ?>
        success1();
    <?php endif; ?>
<?php endif; ?>
</script>
