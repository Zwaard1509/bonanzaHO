<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff;
        margin: 0;
        padding: 20px;
        box-sizing: border-box;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #000;
        border-radius: 10px;
        /* Tambahkan sudut radius di sini */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 150px;
        margin-bottom: 10px;
    }

    .address {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .invoice-details {
        font-size: 16px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tfoot td {
        font-weight: bold;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
        font-size: 16px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Cafe IndoJaya">
            <div class="address">
                Jl. Mockingjay No. 45, 4334<br>
                Phone: 123-456-7890 | Email: info@cafeindojaya.com
            </div>
        </div>
        <div class="invoice-details">
            @if(isset($transaksi))
            <div>No. Faktur : {{ $transaksi->id }}</div>
            <div>{{ $transaksi->tanggal }}</div>
            @else
            <div>No. Faktur : Transaksi tidak ditemukan</div>
            @endif
        </div>

        <table>
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Item</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            @if(isset($transaksi) && $transaksi->detailTransaksi)
            <tbody>
                @foreach ($transaksi->detailTransaksi as $item)
                <tr>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>Rp {{ number_format($item->menu->harga,0,",",".") }}</td>
                    <td>Rp {{ number_format($item->subtotal,0,",","." )}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>Rp {{ number_format($transaksi->total_harga,0,",",".") }}</td>
                </tr>
            </tfoot>
            @else
            <tbody>
                <tr>
                    <td colspan="4">Transaksi tidak ditemukan atau tidak memiliki detail transaksi</td>
                </tr>
            </tbody>
            @endif
        </table>
        <div class="footer">
            Terima kasih atas kunjungan Anda!
        </div>
    </div>
</body>

</html>