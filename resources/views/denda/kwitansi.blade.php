<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        table {
            border-spacing: 0;
            width: 100%;
        }

        th {
            background: #404853;
            background: linear-gradient(#687587, #404853);
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 8px;
            text-align: left;
            text-transform: uppercase;
        }

        th:first-child {
            border-top-left-radius: 4px;
            border-left: 0;
        }

        th:last-child {
            border-top-right-radius: 4px;
            border-right: 0;
        }

        td {
            border-right: 1px solid #c6c9cc;
            border-bottom: 1px solid #c6c9cc;
            border-top: 1px solid #c6c9cc;
            padding: 8px;
        }

        td:first-child {
            border-left: 1px solid #c6c9cc;
        }

        tr:first-child td {
            border-top: 0;
        }

        tr:nth-child(even) td {
            background: #e8eae9;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 4px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 4px;
        }

        img {
            width: 40px;
            height: 40px;
            border-radius: 100%;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }
    </style>
    <link rel="stylesheet" href="">
    <title>Kwitansi Denda</title>
</head>

<body>
    <h1 class="center">SMA Negeri 2 Tanjung Jabung Barat</h1>
    <hr>
    <h5 class="center"><u> Kwitansi Denda</u></h5>
    <table id="pseudo-demo">
        <thead>
            <tr>
                <td>Kode Pinjam</td>
                <td>Nama</td>
                <td>Buku</td>
                <td>Tanggal Pinjam</td>
                <td>Tanggal Kembali</td>
                <td>Status Peminjaman</td>
                <td>Denda</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->kode_transaksi }}</td>
                <td>{{ $data->anggota->user->name }}</td>
                <td>{{ $data->buku->judul }}</td>
                <td> {{date('d/m/y', strtotime($data->tgl_pinjam))}}</td>
                <td> {{date('d/m/y', strtotime($data->tgl_kembali))}}</td>
                <td>{{ $data->status }}</td>
                <td><span class="badge badge-danger">Rp. {{ number_format($data->ket ,0)}}</span></td>
                @if( $data->status_denda==1)
                <td> <span class="label label-danger">Belum Lunas</span></td>
                @else($data->status_denda==2)
                <td> <span class="label label-primary">Lunas</span></td>
                @endif
            </tr>
        </tbody>
    </table>
    <p class="right">Tanjung Jabung Barat {{$tgl}}</p>

    <br>
    <p class="right">Admin</p>
</body>

</html>