<?php
session_start();

if (!isset($_SESSION["siswa"])) {
    $_SESSION["siswa"] = [];
}

//Function / APIs
function create($nama, $nis, $rayon)
{
    if ($nama == "" || $nis == "" || $rayon == "") {
        echo "
        <script>
            alert('Data tidak boleh kosong!');
            document.location.href = 'index.php';
        </script>";

        header('location: index.php');
    } else {
        $siswa = array(
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
        );

        array_push($_SESSION["siswa"], $siswa);
    }
}

function update($id, $nama, $nis, $rayon)
{
    $_SESSION['siswa'][$id]['nama'] = $nama;
    $_SESSION['siswa'][$id]['nis'] = $nis;
    $_SESSION['siswa'][$id]['rayon'] = $rayon;

    header('location: index.php');
    $_SESSION['alert'] = 'Data kamu berhasil di Update!';
}

function destroy($id)
{
    unset($_SESSION['siswa'][$id]);

    header('location: index.php');
    $_SESSION['alert'] = 'Data kamu berhasil di Hapus!';
}

function destroyAll() 
{
    unset($_SESSION['siswa']);

    $_SESSION['alert'] = 'SEMUA Data kamu berhasil di Hapus!';
}