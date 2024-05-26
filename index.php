<?php
require 'functions.php';

if (isset($_POST['submit'])) {
    create($_POST['nama'], $_POST['nis'], $_POST['rayon']);
}

//Alert Message(s)
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Data Siswa Banyu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='style/style.css' rel='stylesheet'>
    <link href='style/poppins-font.css' rel='stylesheet'>

    <!-- Font Awesome Icon -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

</head>

<body>
    <?php if (@$alert) : ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($alert); ?>
        </div>
    <?php endif; ?>

    <div class="title text-center my-3">
        <h1 class="fw-bold m-0 p-0 display-2">Data Siswa</h1>
        <p class="fw-light text-secondary m-0 p-0">Daftar siswa <span class="fw-bold">Banyu Bagastara Nugroho | PPLG X-1</span></p>
    </div>
    <div class="d-flex justify-content-center my-5 container">
        <form action="" method="POST" class="shadow form" style="border: solid 3px black; padding: 30px; border-radius: 20px;">
            <label for="nama" class="fw-bold text-secondary">Nama : </label>
            <input type="text" id="nama" name="nama" class="form-control inp-txt" required>
            <br>
            <label for="nis" class="fw-bold text-secondary">NIS : </label>
            <input type="number" id="nis" name="nis" class="form-control inp-txt" required>
            <br>
            <label for="rayon" class="fw-bold text-secondary">Rayon : </label>
            <input type="text" id="rayon" name="rayon" class="form-control inp-txt" required>
            <br>
            <input type="submit" name="submit" class="fw-bold sbt-button ">
        </form>
    </div>

    <div class="container my-5">
        <a href="deleteAll.php" name="reset" class="btn btn-danger mb-2 reset" onclick="return confirm('Apakah kamu yakin ingin HAPUS SEMUA data dari tabel kamu?')"><i class="fa fa-refresh"></i> Reset</a>
        <table id="myTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Rayon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($_SESSION["siswa"] as $key => $ssw) : ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($ssw["nama"]); ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($ssw["nis"]); ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($ssw["rayon"]); ?>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= $key ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="edit.php?id=<?= $key ?>" class="btn btn-warning"><i class="fa fa-edit"></i> <span class="text-label d-none d-lg-inline">Edit</span></a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        //DataTables jQuery
        $(document).ready(function() {
            $('#myTable').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                "responsive": true,
                "columns": [{width: '5%'}, {width: '50%'}, null, null, {width: '15%'}],
                "columnDefs": [
                    {
                        responsivePriority: 1,
                        targets: 4
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    },
                    {
                        responsivePriority: 4,
                        targets: 3
                    },
                    {
                        responsivePriority: 5,
                        targets: 0
                    },
                ],
                "dom": 'Bfrtip',
                "buttons": [
                    'colvis'
                ]
            });
        });
    </script>
</body>

</html>