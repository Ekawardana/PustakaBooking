<html>

<head>
    <title>Bukti Booking</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='center' style='padding-right:100px; vertical-align:top'>
                <h1>Bukti Booking Buku</h1>
            </td>
        </table>
        <table border=1>
            <?php
            foreach ($useraktif as $u) :
            ?>
                <tr>
                    <th>Nama Anggota : <?= $u->name; ?></th>
                </tr>
                <tr>
                    <th>Buku Yang dibooking</th>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>
                    <div class="table-responsive">
                        <table border=1>
                            <tr>
                                <th>No.</th>
                                <th>Buku</th>
                                <th>Penulis</th>
                                <th>penerbit</th>
                                <th>Tahun</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($items as $i) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td> <?= $i['judul_buku']; ?></td>
                                    <td><?= $i['pengarang']; ?></td>
                                    <td><?= $i['penerbit']; ?></td>
                                    <td><?= $i['tahun_terbit']; ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <?= md5(date('d M Y H:i:s')); ?>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>