<?php
require 'functions.php';

$id = $_GET['id'];
$data = $_SESSION['siswa'][$id];

if (isset($_POST['submit'])) {
    update($id, $_POST['nama'], $_POST['nis'], $_POST['rayon']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Data Siswa Banyu | Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='style/style.css' rel='stylesheet'>
    <link href='style/poppins-font.css' rel='stylesheet'>

    <!-- Font Awesome Icon -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>

</head>

<body>
    <div class="container">
        <div class="title mt-3 mb-5">
            <h1 class="fw-bold m-0 p-0 display-4">Edit Data Siswa</h1>
            <p class="fw-light text-secondary m-0 p-0">Daftar siswa <span class="fw-bold">Banyu Bagastara Nugroho | PPLG X-1</span></p>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <form action="" method="POST" class="shadow" style="width: 100%; border: solid 3px black; padding: 30px; border-radius: 20px;">
                <label for="nama" class="fw-bold text-secondary">Nama : </label>
                <input value="<?= htmlspecialchars($data['nama']); ?>" type="text" id="nama" name="nama" class="form-control inp-txt" required>
                <br>
                <label for="nis" class="fw-bold text-secondary">NIS : </label>
                <input value="<?= htmlspecialchars($data['nis']); ?>" type="number" id="nis" name="nis" class="form-control inp-txt" required>
                <br>
                <label for="rayon" class="fw-bold text-secondary">Rayon : </label>
                <input value="<?= htmlspecialchars($data['rayon']); ?>" type="text" id="rayon" name="rayon" class="form-control inp-txt" required>
                <br>
                <div class="d-flex align-items-center gap-2">
                    <a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                    <input type="submit" name="submit" value="Edit" class="btn btn-warning text-white fw-bold">
                </div>
            </form>
        </div>
    </div>
</body>

</html>