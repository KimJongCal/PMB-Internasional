<!DOCTYPE html>
<html>
<head>
	<title>PMB - UIN Sunan Gunung Djati Bandung</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('design-backend/bootstrap/css/bootstrap.min.css');?>">
</head>
<body>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">New Students Enrolment UIN Sunan Gunung Djati Bandung</h3>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
          <tr>
            <td>Payment Code</td>
            <td>:</td>
            <td><?=$kd_pembayaran?></td>
          </tr>
          <tr>
            <td>Passport Number</td>
            <td>:</td>
            <td><?=$nik_passport?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td>:</td>
            <td><?=$nama?></td>
          </tr>
          <tr>
            <td>Place/Date of Birth</td>
            <td>:</td>
            <td><?=$tempat.'/'.$tgl_lahir?></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>:</td>
            <td><?=$jenis_kelamin?></td>
          </tr>
          <tr>
            <td>Nationality</td>
            <td>:</td>
            <td><?=$kebangsaan?></td>
          </tr>
          <tr>
            <td>Username</td>
            <td>:</td>
            <td><?=$email?></td>
          </tr>
          <tr>
            <td>Password</td>
            <td>:</td>
            <td><?=$password?></td>
          </tr>
        </table>
		</div>
	</div>
	<div class="panel-footer">

   <p>To make a payment can transfer to the account of <b>Bank Syariah Mandiri</b>:</p>
   <p>Account number: <b>7107987341</b></p>
   <p>on behalf of: <b>KEMENAG UIN SGD BLU 04</b></p>
   <br>
   <p>- Then please come to UIN Sunan Gunung Djati Bandung, aljamiah building in academic section third floor. on <b>25 July - 26 July 2018, at 8 a.m - 12 a.m</b></p>
   <p>- Bring the physical evidence of the original recommendation letter from the embassy.</p>
   <br>
   <p>If there is wrong data, please contact <i>contact.pmb@uinsgd.ac.id</i> with the above format.</p>
   
  </div>
</body>
</html>