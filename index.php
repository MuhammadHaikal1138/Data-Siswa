<?php
session_start();

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

if (isset($_POST['kirim'])) {
    if ($_POST['nama'] == "" && $_POST['nis'] == "" && $_POST['rayon'] == "") {
        echo "Data Kosong!! <br>";
    } else {
        $siswa = array(
            "nama" => $_POST['nama'],
            "nis" => $_POST['nis'],
            "rayon" => $_POST['rayon']
        );
        array_push($_SESSION['dataSiswa'], $siswa);
    }
}


if (isset($_GET['hapus'])) {
    $key = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$key]);

    header('location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
        <h1 class="text-center">Data Siswa</h1>
        <form action="" method="post">
            <div class="py-2">
                <label for="nama">Nama Anda :</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama anda">
            </div>
            <div class="py-2">
                <label for="nis">NIS Anda :</label>
                <input type="number" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS anda">
            </div>
            <div class="py-2">
                <label for="rayon">Rayon Anda :</label>
                <input type="text" class="form-control" name="rayon" id="rayon" placeholder="Masukkan rayon anda">
            </div>
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="submit" name="kirim">Tambah</button>
                <button class="btn btn-primary" type="submit"><a href="destroy.php">Reset</a></button>
            </div>
        </form>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Rayon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php
                if (!empty($_SESSION['dataSiswa'])) {
                    foreach ($_SESSION['dataSiswa'] as $key => $value) {
                        $nama = $value["nama"];
                        $nis = $value["nis"];
                        $rayon = $value["rayon"];
                        echo '
                        <tbody>
                            <tr>
                                <th scope="row">'. $nama .'</th>
                                <td>'. $nis .'</td>
                                <td>'. $rayon .'</td>
                                <td><a href = "?hapus=' . $key . '" class="btn btn-danger ms-2">Hapus</a>
                                <a href = "edit.php?key=' . $key . '" class="btn btn-warning ms-2">Edit</a></td>
                            </tr>
                        </tbody>';
                    }
                }
            ?>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>