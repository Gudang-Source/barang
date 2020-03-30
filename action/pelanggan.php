<?PHP
if(isset($_REQUEST['act'])){
	$act=$_REQUEST['act'];
	if($act=='input'){	
		//input data baru
		$nama = $_POST['nama'];
		$hp = $_POST['hp'];
		$db->query("insert into pelanggan_$c_nim values('','$nama','$hp')");
		header("location:pelanggan.php?msg=1");
	}
	if($act=='edit'){	
		//edit data
		$nama = $_POST['nama'];
		$hp = $_POST['hp'];
		$id = $_POST['id'];
		$db->query("update pelanggan_$c_nim set nama_pelanggan='$nama',hp_pelanggan='$hp' where id_pelanggan='$id'");
		header("location:pelanggan.php?msg=2");
	}
	if($act=='hapus'){
		$id=abs((int)$_GET['id']);
		$db->query("delete from pelanggan_$c_nim where id_pelanggan='$id'");
		header("location:pelanggan.php?msg=3");
	}
}
?>