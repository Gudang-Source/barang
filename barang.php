<?PHP
require_once("config.php");
require_once("action/barang.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Barang - <?PHP echo $c_name; ?></title>
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
					<?PHP 
					if(isset($_GET['msg'])){
						$msg = $_GET['msg'];
						if($msg==1){
							echo "<div class='alert alert-success'>Sukses menambahkan data Barang baru!!</div>";
						}else if($msg==2){
							echo "<div class='alert alert-success'>Sukses menambahkan mengedit data Barang!!</div>";
						}else if($msg==3){
							echo "<div class='alert alert-success'>Sukses menghapus data Barang!!</div>";
						}
					}
					?>
					<div class='panel panel-default'>
						<div class='panel-heading'>Semua Data Barang</div>
						<div class='panel-body'>
							<a class='btn btn-success' href='#tambah'><i class='fa fa-plus'></i> Tambah data barang</a>
							<p>
							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>Kode Barang</th>
								  <th>Nama Barang</th>
								  <th>Harga Barang</th>
								  <th>Aksi</th>
								</tr>
							  </thead>
							  <tbody>
								<?PHP
								$semua_barang = $db->fetch_multiple("select * from barang_$c_nim order by kode_barang DESC");
								if(is_array($semua_barang)){
								foreach($semua_barang as $barang){
								?>
								<tr>
								<td><?PHP echo $app->jadikan_kode_barang($barang['kode_barang']); ?></td>
								<td><?PHP echo $barang['nama_barang']; ?></td>
								<td><?PHP echo $app->rupiah($barang['harga_barang'],0); ?></td>
								<td>
								<div class="btn-group">
								  <a onclick="return confirm('Are you sure you want to delete this data?');" href="barang.php?act=hapus&kode=<?PHP echo $barang['kode_barang']; ?>" class="btn btn-xs btn-danger"> <i class="fa fa-remove" title='Hapus'></i> </a> 
								</div>
								</td>
								</tr>
								<?PHP }}else{echo "Belum ada data!";} ?>
							  </tbody>
							</table>
						</div>
					</div>
					<div class='panel panel-success' id='tambah'>
						<div class='panel-heading'>Tambah Data Barang</div>
						<div class='panel-body'>
							<form method='post' action='barang.php'>
								<div class='form-group'>
									<label>Nama Barang</label>
									<input type='text' class='form-control' name='nama' required/>
								</div>
								<div class='form-group'>
									<label>Harga Barang</label>
									<input type='text' class='form-control' name='harga' required/>
								</div>
								<input type='hidden' name='act' value='input'/>
								<button class='btn btn-success'>Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?PHP require_once(ROOT."/include/footer.php"); ?>
	</body>
	<?PHP require_once(ROOT."/include/js.php"); ?>
</html>