<?PHP
require_once("config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Laporan - <?PHP echo $c_name; ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?PHP require_once(ROOT."/include/css.php"); ?>
	</head>
	<body>
		<header>
			<?PHP require_once(ROOT."/include/header.php"); ?>
		</header>
		<div class='container' style='margin-top:70px'>
			<div class='row' style='min-height:520px'>
				<div class='col-md-12'>
					<div class='panel panel-danger' id='tambah'>
						<div class='panel-heading'>Laporan</div>
						<div class='panel-body'>
							<center>
								<h3><?PHP echo $c_name; ?></h3>
								<h4>Laporan Transaksi (Penjualan Barang)</h4>
								<p>&nbsp;</p>
							</center>
							
							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>No</th>
								  <th>Nama Pelanggan</th>
								  <th>Nama Barang </th>
								  <th>Harga Jual</th>
								  <th>Kredit/Lunas</th>
								  <th>Uang Muka</th>
								  <th>Jumlah Hutang</th>
								  <th>Jangka Waktu</th>
								  <th>Jumlah Angsuran/bulan</th>
								</tr>
							  </thead>
							  <tbody>
								<?PHP
								$no = 1;
								$semua_transaksi = $db->fetch_multiple("select p.nama_pelanggan, b.nama_barang,b.harga_barang,t.* from transaksi_$c_nim t
								INNER JOIN pelanggan_$c_nim p ON t.id_pelanggan=p.id_pelanggan
								INNER JOIN barang_$c_nim b ON t.kode_barang=b.kode_barang
								order by t.id_transaksi DESC");
								if(is_array($semua_transaksi)){
								foreach($semua_transaksi as $trx){
									
								//cari lunas/kredit
								if($trx['cara_pembayaran']==1){
									$lunas_or_kredit = "Lunas";
									$jangka_waktu = 0;
									$jumlah_hutang = 0;
									$angsuran = 0;
								}else{
									$lunas_or_kredit = "Kredit";
									$jangka_waktu = $trx['jangka_waktu'];
									$jumlah_hutang = $trx['harga_barang']-$trx['uang_muka'];
									$angsuran = $jumlah_hutang/$jangka_waktu;
								}
								?>
								<tr>
								<td><?PHP echo $no; ?></td>
								<td><?PHP echo $trx['nama_pelanggan']; ?></td>
								<td><?PHP echo $trx['nama_barang']; ?></td>
								<td><?PHP echo $app->rupiah($trx['harga_barang']); ?></td>
								<td><?PHP echo $lunas_or_kredit; ?></td>
								<td><?PHP echo $app->rupiah($trx['uang_muka']); ?></td>
								<td><?PHP echo $app->rupiah($jumlah_hutang); ?></td>
								<td><?PHP echo $jangka_waktu." Bulan"; ?></td>
								<td><?PHP echo $app->rupiah($angsuran); ?></td>
								</tr>
								<?PHP $no++;}}else{echo "Belum ada data!";} ?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?PHP require_once(ROOT."/include/footer.php"); ?>
	</body>
	<?PHP require_once(ROOT."/include/js.php"); ?>
</html>