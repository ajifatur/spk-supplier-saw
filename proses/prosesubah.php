<?php
require '../connect.php';
require '../class/crud.php';
require '../class/user.php';

$crud=new crud($konek);
$user=new user($konek);

if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$barang=@$_POST['barang'];
$supplier=@$_POST['supplier'];
$kriteria=@$_POST['kriteria'];
$sifat=@$_POST['sifat'];
$nilai=@$_POST['nilai'];
$keterangan=@$_POST['keterangan'];
$bobot=@$_POST['bobot'];

$nama=@$_POST['nama'];
$username=@$_POST['username'];
$password=@$_POST['password'];
$redirect=@$_POST['redirect'];
$current_password=@$_POST['current_password'];
$new_password=@$_POST['new_password'];
$confirm_password=@$_POST['confirm_password'];
switch ($op){
    case 'barang':
        $query="UPDATE jenis_barang SET namaBarang='$barang' WHERE id_jenisbarang='$id'";
        $crud->update($query,$konek,'./?page=barang');
        break;
    case 'supplier':
        $query="UPDATE supplier SET namaSupplier='$supplier' WHERE id_supplier='$id'";
        $crud->update($query,$konek,'./?page=supplier');
        break;
    case 'kriteria':
        $cek="SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria' AND id_kriteria!='$id'";
        $query="UPDATE kriteria SET namaKriteria='$kriteria',sifat='$sifat',id_jenisbarang='$barang' WHERE id_kriteria='$id';";
        $crud->multiUpdate($cek,$query,$konek,'./?page=kriteria');
        break;
    case 'subkriteria':
        $cek="SELECT id_nilaikriteria FROM nilai_kriteria WHERE ((id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')) AND id_nilaikriteria!='$id'";
        $query="UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
        $crud->multiUpdate($cek,$query,$konek,'./?page=subkriteria');
        break;
    case 'bobot':
        $query=null;
        foreach ($bobot as $key=>$value){
            $query.="UPDATE bobot_kriteria SET bobot='$value' WHERE id_bobotkriteria='$key';";
        }
        $crud->update($query,$konek,'./?page=bobot');
    break;
    case 'nilai':
        $query=null;
        foreach ($nilai as $key=>$value){
            $query.="UPDATE nilai_supplier SET id_nilaikriteria='$value' WHERE id_nilaisupplier='$key';";
        }
        $crud->update($query,$konek,'./?page=penilaian');
    break;
    case 'pengguna':
        $cek="SELECT id FROM user WHERE username='$username' AND id!='$id'";
        if($password != ''){
            $hash=password_hash($password, PASSWORD_DEFAULT);
            $query="UPDATE user SET nama='$nama', username='$username', password='$hash' WHERE id='$id'";
        }
        else{
            $query="UPDATE user SET nama='$nama', username='$username' WHERE id='$id'";
        }
        $session = array('id'=>$id,'nama'=>$nama,'username'=>$username);
        if(isset($redirect))
            $user->update($cek,$query,$konek,'./?page='.$redirect,$session);
        else
            $user->update($cek,$query,$konek,'./?page=pengguna',$session);
    break;
    case 'update-password':
        $user->updatePassword($id,$current_password,$new_password,$confirm_password,$konek);
    break;
}