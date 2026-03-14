<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pelacakan Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Dasbor Admin Pelacak Alumni</h2>
        @if(session('success'))
            <div class="alert alert-success shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Target</th>
                            <th>Program Studi</th>
                            <th>Tahun Lulus</th>
                            <th>Status Pelacakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnis as $index => $alumni)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $alumni->nama_asli }}</strong><br>
                                <small class="text-muted">Variasi: {{ $alumni->variasi_nama }}</small>
                            </td>
                            <td>{{ $alumni->program_studi }}</td>
                            <td>{{ $alumni->tahun_lulus }}</td>
                            <td>
                                @if($alumni->status_pelacakan == 'Belum Dilacak')
                                    <span class="badge bg-secondary">{{ $alumni->status_pelacakan }}</span>
                                @elseif($alumni->status_pelacakan == 'Teridentifikasi')
                                    <span class="badge bg-success">{{ $alumni->status_pelacakan }}</span>
                                @elseif($alumni->status_pelacakan == 'Perlu Verifikasi Manual')
                                    <span class="badge bg-warning text-dark">{{ $alumni->status_pelacakan }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $alumni->status_pelacakan }}</span>
                                @endif
                            </td>
                            <td>
                                <!-- <button class="btn btn-sm btn-primary">Lacak Sekarang</button> -->
                                 <form action="/alumni/{{ $alumni->id }}/track" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Lacak Sekarang
                                    </button>
                                </form>

                                <td>
                                <div class="d-flex gap-2">
                                    <form action="/alumni/{{ $alumni->id }}/track" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Lacak Sekarang</button>
                                    </form>
                                    <a href="/alumni/{{ $alumni->id }}" class="btn btn-sm btn-outline-secondary">Lihat Detail</a>
                                </div>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>