<h2 style="margin-bottom: 10px;">Riwayat Barang Hilang</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataHilang as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->lokasi_hilang }}</td>
                <td>{{ $barang->tanggal_hilang }}</td>
                <td>{{ $barang->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div style="height: 30px;"></div> <!-- Spasi antar tabel -->
<h2 style="margin-bottom: 10px;">Riwayat Barang Ditemukan</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataDitemukan as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->lokasi_ditemukan }}</td>
                <td>{{ $barang->tanggal_ditemukan }}</td>
                <td>{{ $barang->status }}</td>
            </tr>
        @endforeach
    </tbody>