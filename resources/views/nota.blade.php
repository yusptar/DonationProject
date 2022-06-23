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

    <!-- <table style="border: 0px;">
        <tr style="border: 0px;">
            <td style="text-align: center;border: 0px;"><img style="width:80px;" src="{{ public_path().('admins/assets/images/logo-yayasan.png') }}"></td>
            <td style="text-align: center;border: 0px;"><b><br>
            Jl. Sanan No.70, Purwantoro<br>
            Kecamatan Blimbing, Kota Malang<br>
            Jawa Timur - 651222</b></td>
        </tr>
    </table> -->
    <center>
        <div class="row">
            <h5>YAYASAN AT-TAUFIQ KOTA MALANG</h4>
            <h5>Jl. Sanan No.70, Purwantoro</h4>
            <h5>Kecamatan Blimbing, Kota Malang</h4>
            <h5>Jawa Timur - 651222</h4>
        </div>
	</center>
    <hr>
    <br>

	<table class='table table-borderless'>

        <tr>
            <td style="padding-right:50px">Nama</td>
            <!-- <td style="padding-right:50px">Qty</td> -->
            <td style="padding-right:100px">: {{$offline->nama}}</td>
        </tr>
        <tr>
            <td style="padding-right:50px">Total</td>
            <!-- <td style="padding-right:50px">Qty</td> -->
            <td style="padding-right:100px">: Rp. {{$offline->nominal}}</td>
        </tr>
	</table>

    <hr>
    <br>
    <h7>Terima kasih telah berdonasi di Yayasan At-Taufiq Kota Malang. Semoga uang yang didonasikan bisa bermanfaat bagi yayasan ini.</h6>

 
</body>
</html>