<?php include 'class.php'; ?>
<?php $hasil = $forecasting->hitung() ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>
<body>
	<div class="container">
		<h1>Forecasting</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produksi</th>
					<th>Peramalan</th>
					<th>Error</th>
					<th>MAD</th>
					<th>MSE</th>
					<th>MAPE</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($hasil['hitung'] as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['produksi'] ?></td>
						<td><?php echo $value['peramalan'] ?></td>
						<td><?php echo $value['error'] ?></td>
						<td><?php echo $value['mad'] ?></td>
						<td><?php echo $value['mse'] ?></td>
						<td><?php echo $value['mape'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Total</th>
					<th><?php echo $hasil['t_produksi'] ?></th>
					<th><?php echo $hasil['t_peramalan'] ?></th>
					<th><?php echo $hasil['t_error'] ?></th>
					<th><?php echo $hasil['t_mad'] ?></th>
					<th><?php echo $hasil['t_mse'] ?></th>
					<th><?php echo $hasil['t_mape'] ?></th>
				</tr>
				<tr>
					<th colspan="3">Rata Rata</th>
					<th><?php echo $hasil['r_error'] ?></th>
					<th><?php echo $hasil['r_mad'] ?></th>
					<th><?php echo $hasil['r_mse'] ?></th>
					<th><?php echo $hasil['r_mape'] ?></th>
				</tr>
			</tfoot>
		</table>
		<div class="card">
			<div class="card-body">
				Hasil prediksi selanjutanya adalalah : <b><?php echo $hasil['ramalan_akhir'] ?></b>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>