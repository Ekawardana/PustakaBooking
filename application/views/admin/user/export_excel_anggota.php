<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>LAPORAN DATA ANGGOTA</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Tanggal Buat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $a) {
            ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $a['name']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?= $a['Role_id'] = "Pelanggan"; ?></td>
                    <td><?= $a['is_active']; ?></td>
                    <td><?= date('d F Y', $a['date_created']); ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>