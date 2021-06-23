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
        $query="UPDATE kriteria SET namaKriteria='$kriteria',sifat='$sifat' WHERE id_kriteria='$id';";
        $crud->multiUpdate($cek,$query,$konek,'./?page=kriteria');
        break;
    case 'subkriteria':
        $cek="SELECT id_nilaikriteria FROM nilai_kriteria WHERE ((id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')) AND id_nilaikriteria!='$id'";
        $query="UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
        $crud->multiUpdate($cek,$query,$konek,'./?page=subkriteria');
        break;
    case 'bobot':
        $query=null;
        for ($i=0;$i<count($id);$i++){
            $query.="UPDATE bobot_kriteria SET bobot='$bobot[$i]' WHERE id_bobotkriteria='$id[$i]';";
        }
        $crud->update($query,$konek,'./?page=bobot');
    break;
    case 'nilai':
        $query=null;
        for ($i=0;$i<count($id);$i++){
            $query.="UPDATE nilai_supplier SET id_nilaikriteria='$nilai[$i]' WHERE id_nilaisupplier='$id[$i]';";
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
        $user->update($cek,$query,$konek,'./?page=pengguna',$session);
    break;
}