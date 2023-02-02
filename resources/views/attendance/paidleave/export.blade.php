<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paid Leave - Export</title>
</head>

<body>
    <center>
        <table style="width: 100%">
            <tr>
                <td colspan="3" style="padding-bottom:25px" align="right">
                    @php
                        setlocale(LC_TIME, 'id_ID');
                        \Carbon\Carbon::setLocale('id');
                        $date = $paidLeave->created_at->format('Y-m-d');
                    @endphp
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->isoFormat('dddd, D MMMM Y') }}
                </td>
            </tr>
            <tr>
                <td style="width: 15%;padding-bottom: 25px">Hal</td>
                <td style="width: 1%;padding-bottom: 25px">:</td>
                <td style="padding-bottom: 25px">Surat Izin Cuti</td>
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
                <td><b>{{ $paidLeave->user->fullname }}</b></td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td>:</td>
                <td><b>{{ $paidLeave->user->departement->name }}</b></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><b>
                        @if (!empty($paidLeave->user->getRoleNames()))
                            @foreach ($paidLeave->user->getRoleNames() as $role)
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
                <td>Tanggal cuti</td>
                <td>:</td>
                <td>
                    @php
                        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $paidLeave->end_date);
                        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $paidLeave->start_date);
                        $interval = $to->diffInDays($from) + 1;
                    @endphp
                    <b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $paidLeave->start_date)->isoFormat('dddd, D MMMM Y') }}</b>
                    s/d
                    <b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $paidLeave->end_date)->isoFormat('dddd, D MMMM Y') }}</b>
                    &nbsp;
                    ( <span class="text-danger">
                        {{ $interval }}
                        Hari
                    </span> )
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top">
                    Alasan cuti
                </td>
                <td style="vertical-align: top">:</td>
                <td style="padding-bottom: 25px">
                    <b>{{ $paidLeave->description }}</b>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-bottom: 50px">
                    Demikian permohonan cuti ini saya ajukan. Terimakasih atas perhatian
                    Bapak\Ibu.
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-bottom: 35px"><b>Hormat saya,</b></td>
            </tr>
            <tr>
                <td colspan="3"><b>{{ $paidLeave->user->fullname }}</b></td>
            </tr>
        </table>
    </center>
</body>

</html>
