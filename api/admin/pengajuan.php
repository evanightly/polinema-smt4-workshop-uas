<?php

include_once '../util/db.php';

if (isset($_POST['update'])) {
    $status = escape($_POST['status']);
    $id_pengajuan = escape($_POST['update']);

    $sql = "SELECT * FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'";
    $data_pengajuan = $db->query($sql)->fetch_assoc();
    if($id_detail_jadwal = $data_pengajuan['id_detail_jadwal']) {
        $sql = "UPDATE detail_jadwal SET status_kehadiran_instruktur = NULL WHERE id_detail_jadwal = '$id_detail_jadwal'";
        $db->query($sql);
    }

    $sql = "UPDATE pengajuan SET status = '$status', id_detail_jadwal = NULL WHERE id_pengajuan = '$id_pengajuan'";
    $db->query($sql);
    push_toast('Status pengajuan berhasil diubah');
}

redirect('../../client/admin/pengajuan.php');
