<?php
    include("sambungan.php");
    include("jurujual_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="jurujual">
    <caption>SENARAI NAMA JURUJUAL</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kata Laluan</th>
        <th colspan="2">Tindakan</th>
    </tr>
    
    <?php
        $sql = "SELECT * FROM jurujual";
        $result = mysqli_query($sambungan, $sql);
        
        if ($result) {
            while ($jurujual = mysqli_fetch_array($result)) {
                $idjurujual = $jurujual["idjurujual"];
                echo "<tr>
                        <td>{$jurujual['idjurujual']}</td>
                        <td class='nama'>{$jurujual['namajurujual']}</td>
                        <td class='katalaluan'>{$jurujual['katalaluan']}</td>
                        <td class='actionButton'>
                            <a href='jurujual_update.php?idjurujual={$jurujual['idjurujual']}'>
                                <img id='actionButton' src='imej/update.png' alt='Kemaskini'>
                            </a>
                        </td>
                        <td class='actionButton'>
                            <a href='javascript:padam(\"$idjurujual\");'>
                                <img id='actionButton' src='imej/delete.png' alt='Delete'>
                            </a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Error fetching data: " . mysqli_error($sambungan) . "</td></tr>";
        }
    ?>
</table>

<script>
    function padam(id) {
        if (confirm("Adakah anda ingin padam")) {
            window.location = "jurujual_delete.php?idjurujual=" + id;
        }
    }
</script>