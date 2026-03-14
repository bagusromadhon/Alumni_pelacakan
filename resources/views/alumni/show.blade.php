    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jejak Audit Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <a href="/alumni" class="btn btn-secondary mb-3">&larr; Kembali ke Dasbor</a>
        
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4>Profil Target: {{ $alumni->nama_asli }}</h4>
                <p class="mb-0">Status Saat Ini: <strong>{{ $alumni->status_pelacakan }}</strong></p>
            </div>
        </div>

        <h5>Jejak Bukti Audit (Riwayat Pelacakan)</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Waktu Ekstraksi</th>
                            <th>Sumber Temuan</th>
                            <th>Jabatan & Instansi</th>
                            <th>Skor Kemiripan</th>
                            <th>Aksi Manual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alumni->trackingHistories as $history)
                        <tr>
                            <td>{{ $history->created_at->format('d M Y, H:i') }}</td>
                            <td>{{ $history->sumber_temuan }}</td>
                            <td>{{ $history->jabatan }} di {{ $history->instansi }}</td>
                            <td>
                                @if($history->skor_keyakinan >= 80)
                                    <span class="badge bg-success">{{ $history->skor_keyakinan }}% (Valid)</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $history->skor_keyakinan }}% (Cek Manual)</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ $history->tautan_bukti }}" target="_blank" class="btn btn-sm btn-info text-white">Cek Bukti URL</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada jejak pelacakan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>