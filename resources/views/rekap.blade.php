<!DOCTYPE html>
<html>
<head>
	<title>Rekap Laporan Donasi Yayasan At-Taufiq Kota Malang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>DONASI TRANSFER</h4>
	</center>

    <br><br>
 
	<table class='table table-bordered'>
        <tr style="border: 0px;">
            <td style="text-align: center;border: 0px;"><img style="width:80px;" src="{{ asset('admins/assets/images/logo-yayasan.png') }}" alt="Kop Surat"></td>
            <td style="text-align: center;border: 0px;"><b>YAYASAN AT-TAUFIQ KOTA MALANG<br>
            Jl. Sanan No.70, Purwantoro<br>
            Kecamatan Blimbing, Kota Malang<br>
            Jawa Timur - 651222</b></td>
        </tr>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Nomor Hp</th>
				<th>Pesan</th>
				<th>Nominal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($online as $o)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$o->donatur_name}}</td>
				<td>{{$o->donatur_email}}</td>
				<td>{{$o->donatur_phone}}</td>
				<td>{{$o->message}}</td>
				<td>{{$o->nominal}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>