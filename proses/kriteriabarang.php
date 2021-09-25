<?php
require '../connect.php';
$id = htmlspecialchars(@$_GET['id']);
$op = htmlspecialchars(@$_GET['op']);
$query = "SELECT * FROM kriteria WHERE id_jenisbarang = '$id'";
$execute = $konek->query($query);
if($execute->num_rows > 0){
	if($op == 'nilai'){
		while($data=$execute->fetch_array(MYSQLI_ASSOC)){
			echo '
				  <div class="form-group row">
					  <label class="col-form-label col-md-3">'.$data['namaKriteria'].' <span class="text-danger">*</span></label>
					  <div class="col-md-9">
						 <input type="hidden" name="kriteria[]" value="'.$data['id_kriteria'].'">
						 <select name="nilai[]" class="form-control" required>
							<option value="" disabled selected>-- Pilih--</option>';
							$query2 = "SELECT id_nilaikriteria, keterangan FROM nilai_kriteria WHERE id_kriteria = '$data[id_kriteria]'";
							$execute2 = $konek->query($query2);
							if($execute2->num_rows > 0){
								while($data2 = $execute2->fetch_array(MYSQLI_ASSOC)){
									echo '<option value="'.$data2['id_nilaikriteria'].'">'.$data2['keterangan'].'</option>';
								}
							}
			echo '
						  </select>
					  </div>
				   </div>';
		}
	}
	elseif($op == 'bobot'){
		$listWeight = array(
			array("nama" => "0 - Sangat Rendah", "nilai" => 0),
			array("nama" => "0.25 - Rendah", "nilai" => 0.25),
			array("nama" => "0.5 - Cukup", "nilai" => 0.5),
			array("nama" => "0.75 - Tinggi", "nilai" => 0.75),
			array("nama" => "1 - Sangat Tinggi", "nilai" => 1),
		);
		while($data=$execute->fetch_array(MYSQLI_ASSOC)){
			echo '
				  <div class="form-group row">
					  <label class="col-form-label col-md-3">'.$data['namaKriteria'].' <span class="text-danger">*</span></label>
					  <div class="col-md-9">
						 <input type="hidden" name="kriteria[]" value="'.$data['id_kriteria'].'">
						 <select name="bobot[]" class="form-control" required>
							<option value="" disabled selected>-- Pilih--</option>';
							foreach($listWeight as $w){
                                echo '<option value="'.$w['nilai'].'">'.$w['nama'].'</option>';
                            }
			echo '
						  </select>
					  </div>
				   </div>';
		}
	}
}
?>