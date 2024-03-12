<?php
require_once 'detail_proses.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPPT & Obat</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">
    <table>
        <tr>
            <th>No. RM</th>
            <td><?= $pasien->rm_number ?></td>
        </tr>
        <tr>
            <th>Nama Pasien</th>
            <td><?= $pasien->nama_pasien ?></td>
        </tr>
        <tr>
            <th>Poli</th>
            <td><?= $pasien->sub_unit ?></td>
        </tr>
        <tr>
            <th>Dokter</th>
            <td><?= $pasien->dokter ?></td>
        </tr>
    </table>
<br>
<hr>
</div>
<div class="container">
    <h2>Data CPPT</h2>
    </br>

    <table>
        <thead>
        <tr>
            <th>S</th>
            <th>O</th>
            <th>A</th>
            <th>P</th>
            <th>Instruksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($cppt)){
            foreach ($cppt as $dc){
                ?>
                <tr>
                    <td><?= $dc['subjective'] ?></td>
                    <td><?= $dc['objective'] ?></td>
                    <td><?= $dc['assessment'] ?></td>
                    <td><?= $dc['planning'] ?></td>
                    <td><?= $dc['instruction'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h2>Data Obat</h2>
    </br>

    <table>
        <thead>
        <tr>
            <th>Nama Racikan</th>
            <th>Jenis Racikan</th>
            <th>Obat</th>
            <th>Dosis</th>
            <th>Aturan Pakai</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($racikan)){
            foreach ($racikan as $r){
                ?>
                <tr>
                    <td><?= $r['mix_name'] ?></td>
                    <td><?= $r['jenis_racikan'] ?></td>
                    <td><?= $r['nama_obat'] ?></td>
                    <td><?= $r['dosis'] ?></td>
                    <td><?= $r['aturan_pakai'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>

</html>


