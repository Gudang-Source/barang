<?PHP
if(isset($_REQUEST['act'])){
	$act=$_REQUEST['act'];
	if($act=='input'){	
		//input data baru
		$kode_barang = $_POST['kode_barang'];
		$id_pelanggan = $_POST['id_pelanggan'];
		$cara_pembayaran = $_POST['cara_pembayaran'];
		$uang_muka = $_POST['uang_muka'];
		$jangka_waktu = $_POST['jangka_waktu'];
		if($cara_pembayaran==1){
			$data_barang = $db->fetch("select harga_barang from barang_$c_nim where kode_barang='$kode_barang'");
			$uang_muka=$data_barang['harga_barang'];
			$jangka_waktu = 0;
		}
		$db->query("insert into transaksi_$c_nim values('','$id_pelanggan','$kode_barang','$cara_pembayaran','$uang_muka','$jangka_waktu')");
		header("location:input.php?msg=1");
	}
}
?>