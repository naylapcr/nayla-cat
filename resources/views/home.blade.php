<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
</head>
<body>
    <h1>Informasi Pegawai</h1>
    <ul>
        <li><strong>Nama:</strong> {{ $name }}</li>
        <li><strong>Umur:</strong> {{ $my_age }} tahun</li>
        <li><strong>Hobi:</strong>
            <ul>
                @foreach ($hobbies as $hobby)
                    <li>{{ $hobby }}</li>
                @endforeach
            </ul>
        </li>
        <li><strong>Tanggal Harus Wisuda:</strong> {{ $tgl_harus_wisuda }}</li>
        <li><strong>Sisa Hari Belajar:</strong> {{ $time_to_study_left }} hari</li>
        <li><strong>Semester Saat Ini:</strong> {{ $current_semester }}</li>
        <li><strong>Pesan:</strong> {{ $semester_info }}</li>
        <li><strong>Cita-cita:</strong> {{ $future_goal }}</li>
    </ul>
</body>
</html>
