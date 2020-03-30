<?PHP
if(isset($_REQUEST['act'])){
	$act=$_REQUEST['act'];
	if($act=='input'){	
		//input data baru
		$nama = $_POST['nama'];
		$harga = abs((int)$_POST['harga']);
		$db->query("insert into barang_$c_nim values('','$nama','$harga')");
		header("location:barang.php?msg=1");
	}
	if($act=='hapus'){
		$kode=abs((int)$_GET['kode']);
		$db->query("delete from barang_$c_nim where kode_barang='$kode'");
		header("location:barang.php?msg=3");
	}
}
?>