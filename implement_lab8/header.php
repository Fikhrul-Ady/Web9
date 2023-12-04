<?php
include('koneksi.php');

// data barang
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <header>
            <h1>Implementasi</h1>
        </header>
</body>
</html>
