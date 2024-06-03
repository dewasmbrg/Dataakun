<?php
$koneksi = new mysqli('localhost', 'id21956202_kelompok3', '22166012Nurul$', 'id21956202_dataakun');
if ($koneksi->connect_error) {
    die("koneksi gagal:" . $koneksi->connect_error);
}