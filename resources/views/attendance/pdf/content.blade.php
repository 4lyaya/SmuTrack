<table width="100%" style="border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr style="background-color: #f3f4f6;">
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">No</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">NIS</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Nama Siswa</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Kelas</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Waktu Scan</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $index => $attendance)
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $attendance->student->nis }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $attendance->student->name }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $attendance->student->classroom->name }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $attendance->scan_time->format('H:i:s') }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $attendance->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@if ($classroom)
    <p style="margin-bottom: 5px;">Total Siswa: {{ $classroom->students->count() }}</p>
@endif
<p style="margin-bottom: 5px;">Hadir: {{ $attendances->where('status', 'Masuk / Tepat Waktu')->count() }}</p>
<p style="margin-bottom: 5px;">Terlambat: {{ $attendances->where('status', 'Terlambat / Tidak Tepat Waktu')->count() }}
</p>
<p style="margin-bottom: 5px;">Tidak Hadir:
    {{ ($classroom ? $classroom->students->count() : Student::count()) - $attendances->count() }}</p>
