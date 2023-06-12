<?php

include 'templates/koneksi.php';

$id_spk  = $_GET['id_spk'];
$id_item  = $_GET['id_item'];

$insert = mysqli_query($koneksi, "DELETE FROM treatment_detail WHERE id_treatment_detail = $id_item");

if ($insert) {
    echo '<script>alert("Berhasil menghapus item!");</script>
			<script>window.location.href="treatment_form.php?id_treatment=' . $id_spk . '";</script>';
} else {

    echo '<script>alert("Gagal menghapus item!");</script>
			<script>window.location.href="treatment_form.php?id_treatment=' . $id_spk . '";</script>';
}