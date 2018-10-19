<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Card Participant</title>
		<style type="text/css">
			.center{
				width: 80%;
				margin: 0 auto;
				text-align: center;			}
		</style>
	</head>
	<body>
		<table align="center">
			<tr>
				<td>
					<img src="./assets/images/logo-uin3.png" width="80px" height="110px">
				</td>
				<td align="center">
					<font face="Arial" color="black" size="5"> <p align="center"> KEMENTERIAN AGAMA REPUBLIK INDONESIA </p></font>
					<font face="Arial" color="black" size="5"> <p align="center"> UNIVERSITAS ISLAM NEGERI </p></font>
					<font face="Arial" color="black" size="5"> <p align="center"> SUNAN GUNUNG DJATI BANDUNG </p></font>
					<font face="Arial" color="black" size="3"> <p align="center"> Jalan A.H. Nasution No. 105 Cibiru Bandung 40614 </p></font>
				</td>
			</tr>
		</table>
		<hr>
		<div class="center">
			<h3><b>Card Participant</b></h3>
			<h3><b>International PMB UIN Sunan Gunung Djati Bandung</b></h3>
		</div>

		<table align="center">
			<tr>
				<td>
					<table>
						<tr>
				            <td>Participant Number</td>
				            <td>:</td>
				            <td><?=$tbUsers->nomor_peserta?></td>
				        </tr>
				        <tr>
				            <td>Passport Number</td>
				            <td>:</td>
				            <td><?=$tbUsers->nik_passport?></td>
				        </tr>
				        <tr>
				            <td>Name</td>
				            <td>:</td>
				            <td><?=$tbBiodata->nama?></td>
				        </tr>
				        <tr>
				            <td>Place/Date of Birth</td>
				            <td>:</td>
				            <td><?=$tbBiodata->tempat.'/'.$tbBiodata->tgl_lhr?></td>
				        </tr>
				        <tr>
				            <td>Nationality</td>
				            <td>:</td>
				            <td><?=$tbBiodata->kebangsaan?></td>
				        </tr>
				        <tr>
				            <td>Email</td>
				            <td>:</td>
				            <td><?=$tbUsers->username?></td>
				        </tr>
				        <tr>
				            <td>First Majors Selection</td>
				            <td>:</td>
				            <td><?=$tbPilihan1->jurusan?></td>
				        </tr>
				        <tr>
				            <td>Second Majors Selection</td>
				            <td>:</td>
				            <td><?=$tbPilihan2->jurusan?></td>
				        </tr>
				        <tr>
				            <td>Third Majors Selection</td>
				            <td>:</td>
				            <td><?=$tbPilihan3->jurusan?></td>
				        </tr>
					</table>
				</td>
			</tr>
		</table>

		<p>- please come to uin sunan gunung djati bandung, aljamiah building in academic section third floor. on <b> July 25 - July 26, at 8 a.m - 12 a.m </b></p>
		<p>- bring the physical evidence of the original recommendation letter from the embassy.</p>
	</body>
</html>
