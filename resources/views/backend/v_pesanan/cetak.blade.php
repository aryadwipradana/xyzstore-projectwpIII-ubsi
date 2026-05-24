<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }

    table tr td {
        padding: 6px;
        font-weight: normal;
        border: 1px solid #ccc;
    }

    table th {
        border: 1px solid #ccc;
    }
</style>
<table>
    <!-- <tr>
        <td align="center">
            <img src="{{ asset('images/header.png') }}" width="50%">
        </td>
    </tr> -->
    <tr>
        <td align="left">
            Perihal : {{ $judul }} <br>
            Tanggal Awal: {{ $tanggalAwal }} s/d Tanggal Akhir: {{ $tanggalAkhir }}
        </td>
    </tr>
</table>
<p></p>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Status</th>
            <th>Nama Produk</th>
            <th>Qty</th>
            <th>Total Bayar</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($cetak as $row)
        @foreach ($row->orderItems as $item)
            <tr>
                <td>{{ $loop->parent->iteration }}</td>

                <td>
                    {{ $row->customer->user->nama ?? '-' }}
                </td>

                <td>
                    {{ $row->status }}
                </td>

                <td>
                    {{ $item->produk->nama_produk ?? '-' }}
                </td>

                <td>
                    {{ $item->quantity }}
                </td>

                <td>
                    Rp. {{ number_format($row->total_harga + $row->biaya_ongkir, 0, ',', '.') }}
                </td>
            </tr>
        @endforeach
    @endforeach
</tbody>
</table>
<script>
    window.onload = function() {
        printStruk();
    }

    function printStruk() {
        window.print();
    }
</script>
