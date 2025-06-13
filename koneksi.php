<?php
$conn    = mysqli_connect('localhost', 'root', '', 'optik_mirogril');

if (mysqli_connect_errno()) {
    echo "Gagal Terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}
