{{-- filepath: resources/views/filament/pages/riwayat-barang.blade.php --}}
<x-filament::page>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <div id="content-hilang">
        <h2>Riwayat Barang Hilang</h2>
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
                @foreach($dataHilang as $i => $item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->lokasi_hilang }}</td>
                    <td>{{ $item->tanggal_hilang }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="content-ditemukan">
        <h2>Riwayat Barang Ditemukan</h2>
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
                @foreach($dataDitemukan as $i => $item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->lokasi_ditemukan}}</td>
                    <td>{{ $item->tanggal_ditemukan }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('riwayat-barang.pdf', ['jenis' => 'ditemukan']) }}" method="get" class="mb-3" style="margin-top:16px;">
            <button type="submit" style="background:#ff9800;color:#fff;border:none;padding:8px 20px;border-radius:4px;cursor:pointer;">Unduh PDF</button>
        </form>
    </div>

    <script>
        function showTab(tab) {
            document.getElementById('content-hilang').style.display = tab === 'hilang' ? '' : 'none';
            document.getElementById('content-ditemukan').style.display = tab === 'ditemukan' ? '' : 'none';
            document.getElementById('tab-hilang').style.background = tab === 'hilang' ? '#ff9800' : '#fff';
            document.getElementById('tab-hilang').style.color = tab === 'hilang' ? '#fff' : '#ff9800';
            document.getElementById('tab-ditemukan').style.background = tab === 'ditemukan' ? '#ff9800' : '#fff';
            document.getElementById('tab-ditemukan').style.color = tab === 'ditemukan' ? '#fff' : '#ff9800';
        }
    </script>
</x-filament::page>