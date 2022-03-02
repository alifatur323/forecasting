<?php
class forecasting
{
	public function data()
	{
		$data = array(3,2,1,5,4,3,2,2,2,3,5,4,1,1,1,3,2,1,4,2,3,1,2,2,3,4,1,3,3,1);
		return $data;
	}

	public function weighted()
	{
		return 5;
	}

	public function hitung()
	{
		$data = $this->data();
		$weighted = $this->weighted();
		$t_produksi = 0;
		$t_peramalan = 0;
		$t_error = 0;
		$t_mad = 0;
		$t_mse = 0;
		$t_mape = 0;
		$r_error = 0;
		$r_mad = 0;
		$r_mse = 0;
		$r_mape = 0;
		foreach ($data as $key => $value) {
			$hitung[$key]['produksi'] = $value;
			if ($key < $this->weighted()) {
				$hitung[$key]['peramalan'] = "";
				$hitung[$key]['error'] = "";
				$hitung[$key]['mad'] = "";
				$hitung[$key]['mse'] = "";
				$hitung[$key]['mape'] = "";
			} else {
				$total = 0;
				for ($i=($key-1); $i > (($key-1) - $weighted); $i--) { 
					$total += $data[$i];
				}
				$hitung[$key]['peramalan'] = $total/$weighted;
				$hitung[$key]['error'] = $hitung[$key]['produksi']-$hitung[$key]['peramalan'];
				$hitung[$key]['mad'] = abs($hitung[$key]['error']);
				$hitung[$key]['mse'] = pow($hitung[$key]['error'], 2);
				$hitung[$key]['mape'] = $hitung[$key]['mad']/$hitung[$key]['produksi'];
			}
			$t_produksi += $hitung[$key]['produksi'];
			$t_peramalan += $hitung[$key]['peramalan'];
			$t_error += $hitung[$key]['error'];
			$t_mad += $hitung[$key]['mad'];
			$t_mse += $hitung[$key]['mse'];
			$t_mape += $hitung[$key]['mape'];
			$r_error = $t_error/(count($data) - $weighted);
			$r_mad = $t_mad/(count($data) - $weighted);
			$r_mse = $t_mse/(count($data) - $weighted);
			$r_mape = $t_mape/(count($data) - $weighted);
		}
		$data_akhir = array_slice($hitung, -$weighted, $weighted, true);
		$total_akhir = 0;
		foreach ($data_akhir as $key => $value) {
			$total_akhir += $value['produksi'];
		}
		$ramalan_akhir = $total_akhir/$weighted;
		echo $ramalan_akhir;
		$hasil['hitung'] = $hitung;
		$hasil['t_produksi'] = $t_produksi;
		$hasil['t_peramalan'] = $t_peramalan;
		$hasil['t_error'] = $t_error;
		$hasil['t_mad'] = $t_mad;
		$hasil['t_mse'] = $t_mse;
		$hasil['t_mape'] = $t_mape;
		$hasil['r_error'] = $r_error;
		$hasil['r_mad'] = $r_mad;
		$hasil['r_mse'] = $r_mse;
		$hasil['r_mape'] = $r_mape;
		$hasil['ramalan_akhir'] = $ramalan_akhir;
		return $hasil;
	}
}
$forecasting = new forecasting();
?>