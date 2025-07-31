<table width="100%" style="margin-top: 50px;">
    <tr>
        <td width="70%"></td>
        <td width="30%" style="text-align: center;">
            <p>{{ config('app.school_address') }}, {{ \Carbon\Carbon::parse($date)->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: 50px;">(___________________)</p>
        </td>
    </tr>
</table>
