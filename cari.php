<?php
global $pdo;
require_once 'config.php';

if(isset($_GET['cari'])){
    $q = "
        SELECT 
            p.rm_number,
            p.name as \"nama_pasien\",
            rajal.id as \"rajal_id\",
            rajal.created_at as \"tgl_kunjungan\",
            su.name as \"sub_unit\",
            e.name as \"dokter\"
        FROM patients p
        LEFT JOIN outpatient_cares rajal ON rajal.patient_id=p.id
        LEFT JOIN employees e ON e.id = rajal.doctor_id
        LEFT JOIN m_sub_units su ON su.id = rajal.sub_unit_id
        WHERE p.rm_number like '%".$_GET['cari']."%' and su.id is not null
        ORDER BY rajal.created_at DESC
        LIMIT 10
    ";
    $query = $pdo->query($q);
    $pasien = $query->fetchAll();
}