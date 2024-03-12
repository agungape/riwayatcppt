<?php
require_once 'cari.php';
//print_r($pasien);die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pencarian</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Form Pencarian</h2>
        <form action="" method="GET">
            <label for="cari">Nomor RM Pasien :</label>
            <input type="text" id="cari" name="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>" required>
            <button type="submit">Cari</button>
        </form>
        </br>

        <table>
            <thead>
                <tr>
                    <th>No. RM</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Poliklinik </th>
                    <th>Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(isset($pasien)){
                foreach ($pasien as $p){
                ?>
                <tr>
                    <td><?= $p['rm_number'] ?></td>
                    <td><?= $p['nama_pasien'] ?></td>
                    <td><?= $p['tgl_kunjungan'] ?></td>
                    <td><?= $p['sub_unit'] ?></td>
                    <td><?= $p['dokter'] ?></td>
                    <td><a href="detail.php?rajalid=<?= $p['rajal_id'] ?>">Detail</a></td>
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