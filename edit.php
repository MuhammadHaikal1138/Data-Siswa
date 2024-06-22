<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    if (isset($_SESSION['dataSiswa'][$key])) {
        $siswa = $_SESSION['dataSiswa'][$key];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($key)) {
    // update data siswa
    $_SESSION['dataSiswa'][$key]['nama'] = $_POST['nama'];
    $_SESSION['dataSiswa'][$key]['nis'] = $_POST['nis'];
    $_SESSION['dataSiswa'][$key]['rayon'] = $_POST['rayon'];

// kembali ke halaman index
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container mt-2 py-3">
        <h1 class="text-center">Edit Data Siswa</h1>
        <form action="" method="post">
            <div class="py-2">
                <label for="nama">Nama Anda :</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama anda" value="<?php echo $siswa['nama'];?>">
            </div>
            <div class="py-2">
                <label for="nis">NIS Anda :</label>
                <input type="number" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS anda" value="<?php echo $siswa['nis'];?>">
            </div>
            <div class="py-2">
                <label for="rayon">Rayon Anda :</label>
                <input type="text" class="form-control" name="rayon" id="rayon" placeholder="Masukkan rayon anda" value="<?php echo $siswa['rayon'];?>">
            </div>
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="submit" name="kirim">Simpan</button>
                <button class="btn btn-primary" type="submit"><a href="index.php">Kembali</a></button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>