<?php
require_once 'config.php';

if(isset($_GET['rajalid'])){
    // DATA PASIEN ===============================================================
    $qPasien = '
                SELECT
                    p.rm_number,
                    p.name as "nama_pasien",
                    rajal.created_at as "tgl_kunjungan", 
                    su.name as "sub_unit",
                    e.name as "dokter"
                FROM outpatient_cares rajal
                LEFT JOIN patients p ON p.id=rajal.patient_id
                LEFT JOIN employees e ON e.id = rajal.doctor_id
                LEFT JOIN m_sub_units su ON su.id = rajal.sub_unit_id
                WHERE rajal.id='.$_GET['rajalid'];

    $queryPasien = $pdo->query($qPasien);
    $pasien = $queryPasien->fetch(PDO::FETCH_OBJ);

    // DATA CPPT ===============================================================
    $qCppt = '
                SELECT * 
                FROM rm_cppt
                WHERE outpatientcare_id='.$_GET['rajalid'];
    $queryCppt = $pdo->query($qCppt);
    $cppt = $queryCppt->fetchAll();

    // DATA RACIKAN ============================================================
    $qObatRacikan = '
                    SELECT
                        pd.mix_name,
                        dgm.name as "jenis_racikan",
                        dg.name as "nama_obat",
                        pd.dosage_information as "dosis",
                        pd.rules as "aturan_pakai"
                    FROM prescriptions p
                    LEFT JOIN prescriptions_detail pd ON pd.prescription_id=p.id
                    LEFT JOIN drugstore_goods dg ON dg.id=pd.goods_id
                    LEFT JOIN drugstore_goods_mixs dgm ON dgm.id=pd.goods_mix_id
                    WHERE p.outpatientcare_id='.$_GET['rajalid'].'
                    ';
    $queryObatRacikan = $pdo->query($qObatRacikan);
    $racikan = $queryObatRacikan->fetchAll();

}

?>