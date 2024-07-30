<?php
date_default_timezone_set('Asia/Jakarta');
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'surat';

$konek = mysqli_connect($hostname, $username, $password, $database);

if (!$konek) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
