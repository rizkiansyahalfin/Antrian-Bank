<!DOCTYPE html>
<html>
<head>
    <title>Laporan : Queue</title>
    <link href="../css/bootstrap.min.css.map" rel="stylesheet">
</head>
<body>
    <h1 align="center">BANK INDONESIA</h1>
    <table cellspacing="5" cellpadding="5" width="100%" height="100%" bgcolor="white" align="center" border="1">
    <thead>
    <tr align="center">
        <th align="center">No</th>
        <th align="center">ID</th>
        <th align="center">Loket</th>
        <th align="center">Waktu</th>
        <th align="center">Status</th>
    </tr>
    </thead>
    <?php
    include '../view/koneksi.php';
    $data_antrian = mysqli_query($connect, "SELECT * from data_antrian");
    $no=1;
    foreach ($data_antrian as $row){
        echo
        "<tbody>
        <tr>
            <td>$no</td>
            <td>".$row['id']."</td>
            <td>".$row['counter']."</td>
            <td>".$row['waktu']."</td>
            <td>".$row['status']."</td>
        </tr>
        </tbody>";
           $no++;
    }
    ?>
    <script>window.print()</script>
</table>
</body>
</html>