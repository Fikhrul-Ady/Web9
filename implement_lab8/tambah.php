<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;

        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;
        }
    }

    $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
    $sql .= "VALUES ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";

    $result = mysqli_query($conn, $sql);

    header('location: index.php');
}
?>

<?php require('header.php'); ?>

<div class="container">
    <h1>Tambah Barang</h1>
    <div class="main">
        <form method="post" action="tambah.php" enctype="multipart/form-data">
            <table class="styled-table">
                <tr>
                    <td class="input"><label>Nama Barang</label></td>
                    <td class="input"><input type="text" name="nama" /></td>
                </tr>
                <tr>
                    <td class="input"><label>Kategori</label></td>
                    <td class="input">
                        <select class="select" name="kategori">
                            <option value="Komputer">Komputer</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Hand Phone">Hand Phone</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="input"><label>Harga Jual</label></td>
                    <td class="input"><input type="text" name="harga_jual" /></td>
                </tr>
                <tr>
                    <td class="input"><label>Harga Beli</label></td>
                    <td class="input"><input type="text" name="harga_beli" /></td>
                </tr>
                <tr>
                    <td class="input"><label>Stok</label></td>
                    <td class="input"><input type="text" name="stok" /></td>
                </tr>
                <tr>
                    <td class="input"><label>File Gambar</label></td>
                    <td class="input"><input type="file" name="file_gambar" /></td>
                </tr>
            </table>
            <div class="submit">
                <input type="submit" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</div>

<?php require('footer.php'); ?>


