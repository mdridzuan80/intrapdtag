<!DOCTYPE html>
<html>
<head>
    <title>{{ $acara->tajuk }}</title>
    <style>
        /* Add CSS styles here for your PDF */
        body { font-family: sans-serif; }
        .header { font-size: 20px; font-weight: bold; }
        /* ... other styles */
    </style>
</head>
<body>
    <table style="width: 100%;">
<tbody>
    <tr>
        <td style="text-align: center;">
            <img height="100" src="data:image/svg+xml;base64, {!! $logo !!} ">
        </td>
<tr>
    <tr>
<td style="text-align: center;">&nbsp;</td>
</tr>
<td style="background-color: #800080; text-align: center;" cellspacing="0" cellpadding="30"><strong><span style="color: #ffffff;"><h1>PENDAFTARAN ACARA</h1></span></strong></td>
</tr>
<tr>
<td style="text-align: center;"><h2>{{ strtoupper($acara->tajuk) }}</h2></td>
</tr>
<tr>
<td style="text-align: center;">Sila imbas kod QR di bawah untuk pendaftaran kehadiran</td>
</tr>
<tr>
<td style="text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center;">
    <table style="margin-left: auto; margin-right: auto; border-style: dashed; border-color: #4287f5" border="2;" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td><img src="data:image/png;base64, {!! $qrcodeimg !!} "></td>
</tr>
</tbody>
</table>
    </td>
</tr>
<tr>
<td style="text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center;">Jika anda menghadapi masalah untuk mengimbas QR di atas, masukkan link di bawah menggunakan aplikasi seperti chrome atau firefox:</td>
</tr>
<tr>
<td style="text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center;">{{ $url }}</td>
</tr>
</tbody>
</table>
</body>
</html>
