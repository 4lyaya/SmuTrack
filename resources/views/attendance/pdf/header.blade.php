<table width="100%" style="border-bottom: 1px solid #000; margin-bottom: 20px;">
    <tr>
        <td width="20%">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo Sekolah" style="height: 80px;">
        </td>
        <td width="60%" style="text-align: center;">
            <h2 style="margin: 0; font-size: 18px; font-weight: bold;">{{ $schoolName }}</h2>
            <p style="margin: 5px 0 0 0; font-size: 14px;">{{ config('app.school_address') }}</p>
        </td>
        <td width="20%"></td>
    </tr>
</table>

<h3 style="text-align: center; margin-bottom: 20px;">{{ $title }}</h3>
