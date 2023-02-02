<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overtime - Export</title>
</head>

<body>
    <center>
        <table style="width: 100%">
            <tr>
                <td colspan="3" style="padding-bottom:25px" align="right">
                    @php
                        setlocale(LC_TIME, 'id_ID');
                        \Carbon\Carbon::setLocale('id');
                        $date = $overtime->created_at->format('Y-m-d');
                    @endphp
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->isoFormat('dddd, D MMMM Y') }}
                </td>
            </tr>
            <tr>
                <td style="width: 18%;padding-bottom: 25px">Hal</td>
                <td style="width: 1%;padding-bottom: 25px">:</td>
                <td style="padding-bottom: 25px">Surat Izin Lembur</td>
            </tr>
            <tr>
                <td colspan="3">Yth. Direktur PT. Alton Mitra Sejahtera</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-bottom: 25px">di tempat</td>
            </tr>
            <tr>
                <td colspan="3">Dengan hormat,</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-bottom: 25px">yang bertanda tangan di bawah
                    ini :
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><b>{{ $overtime->user->fullname }}</b></td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td>:</td>
                <td><b>{{ $overtime->user->departement->name }}</b></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><b>
                        @if (!empty($overtime->user->getRoleNames()))
                            @foreach ($overtime->user->getRoleNames() as $role)
                                @if ($role == 'admin')
                                    Admin
                                @elseif ($role == 'supervisor')
                                    Supervisor
                                @else
                                    Staff
                                @endif
                            @endforeach
                        @endif
                    </b></td>
            </tr>
            <tr>
                <td>Tanggal lembur</td>
                <td>:</td>
                <td>
                    <b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $overtime->date)->isoFormat('dddd, D MMMM Y') }}</b>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top">
                    Keterangan
                </td>
                <td style="vertical-align: top">:</td>
                <td style="padding-bottom: 25px">
                    <b>{{ $overtime->description }}</b>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-bottom: 50px">
                    Demikian permohonan lembur ini saya ajukan. Terimakasih atas perhatian
                    Bapak\Ibu.
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-bottom: 35px"><b>Hormat saya,</b></td>
            </tr>
            <tr>
                <td colspan="3"><b>{{ $overtime->user->fullname }}</b></td>
            </tr>
        </table>
    </center>
</body>

</html>
