<?PHP
require_once("config.php");
require_once("action/input.php");
$cek_pelanggan = $db->num_rows("select id_pelanggan from pelanggan_$c_nim");
$cek_barang = $db->num_rows("select kode_barang from barang_$c_nim");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Input Data Transaksi - <?PHP echo $c_name; ?></title>
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
						<div class='panel-heading'>Tambah Data Transaksi</div>
						<div class='panel-body'>
							<?PHP 
							if(isset($_GET['msg'])){
								$msg = $_GET['msg'];
								if($msg==1){
									echo "<div class='alert alert-success'>Sukse menambahkan data transaksi, silahkan cek di menu laporan!!</div>";
								}
							}
							?>
							<?PHP if($cek_barang!=0 and $cek_pelanggan!=0){ ?>
							<form method='post' action='input.php'>
								<div class='form-group'>
									<label>Pilih Pelanggan</label>
									<select name='id_pelanggan' class='form-control'>
										<?PHP
											$semua_pelanggan = $db->fetch_multiple("select * from pelanggan_$c_nim order by id_pelanggan DESC");
											foreach($semua_pelanggan as $pelanggan){
												$id_pelanggan = $app->jadikan_id_pelanggan($pelanggan['id_pelanggan']);
												echo "<option value='$pelanggan[id_pelanggan]'>$pelanggan[nama_pelanggan] [$id_pelanggan]</option>";
											}
										?>
									</select>
								</div>
								<div class='form-group'>
									<label>Pilih Barang</label>
									<select name='kode_barang' class='form-control'>
										<?PHP
											$semua_barang = $db->fetch_multiple("select * from barang_$c_nim order by kode_barang DESC");
											foreach($semua_barang as $barang){
												$kode_barang = $app->jadikan_kode_barang($barang['kode_barang']);
												$harga_barang = $app->rupiah($barang['harga_barang']);
												echo "<option value='$barang[kode_barang]'>$barang[nama_barang] ::: $harga_barang</option>";
											}
										?>
									</select>
								</div>
								<div class='form-group'>
									<label>Cara Pembayaran</label>
									<select id='cara_pembayaran' name='cara_pembayaran' class='form-control'>
										<option value='1'>CASH</option>
										<option value='2'>KREDIT</option>
									</select>
								</div>
								<div id='form_tambahan' style='display:none' class='alert alert-success'>
									<div class='form-group'>
										<label>Uang Muka (DP)</label>
										<input type='number' class='form-control' name='uang_muka'/>
									</div>
									<div class='form-group'>
										<label>Jangka Waktu (bulan)</label>
										<input type='number' class='form-control' name='jangka_waktu'/>
									</div>
								</div>
								<input type='hidden' name='act' value='input'/>
								<button class='btn btn-success'>Simpan</button>
							</form>
							<?PHP }else{echo "Oppsss... Harap masukan daftar barang dan daftar pelanggan dulu!";} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?PHP require_once(ROOT."/include/footer.php"); ?>
	</body>
	<?PHP require_once(ROOT."/include/js.php"); ?>
	<script>
		$("#cara_pembayaran").change(function() {
			var cara_pembayaran = $("#cara_pembayaran").val();
			if(cara_pembayaran==2){
				$("#form_tambahan").fadeIn("slow");
			}else{
				$("#form_tambahan").fadeOut("slow");
			}
		});
	</script>
</html>