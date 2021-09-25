<!-- Page Title, Breadcrumb -->
<div class="app-title">
    <div>
        <h1>Kriteria</h1>
    </div>
    <div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
            <li class="breadcrumb-item"><a href="./?page=kriteria">Kriteria</a></li>
        </ul>
    </div>
</div>

<!-- Content -->
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?php if($_SESSION['role'] == 1 || $_SESSION['role'] == 3): ?>
            <div class="tile-title-w-btn">
                <div>
                    <a href="#" class="btn btn-sm btn-primary btn-add"><i class="fa fa-plus mr-2"></i>Tambah Data</a>
                </div>
                <div>
                    <select class="form-control form-control-sm" id="categorize" data-op="kriteria">
                        <option value="">Semua Barang</option>
                        <?php
                            $query = "SELECT id_jenisbarang, namaBarang FROM jenis_barang";
                            $execute = $konek->query($query);
                            if($execute->num_rows > 0){
                                while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                    echo '<option value="'.$data['id_jenisbarang'].'">'.$data['namaBarang'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th width="30">No.</th>
                                <th>Kriteria</th>
                                <th>Atribut</th>
                                <th>Barang</th>
                                <?php if($_SESSION['role'] == 1 || $_SESSION['role'] == 3): ?>
                                <th width="50">Opsi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM kriteria JOIN jenis_barang ON kriteria.id_jenisbarang=jenis_barang.id_jenisbarang ORDER BY namaKriteria ASC";
                            $execute = $konek->query($query);
                            if($execute->num_rows > 0){
                                $no = 1;
                                while($data = $execute->fetch_array(MYSQLI_ASSOC)){
                                    echo '
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$data['namaKriteria'].'</td>
                                        <td>'.$data['sifat'].'</td>
                                        <td>'.$data['namaBarang'].'</td>
                                    ';
                                    if($_SESSION['role'] == 1 || $_SESSION['role'] == 3){
                                        echo '
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-warning btn-edit" data-id="'.$data['id_kriteria'].'" data-op="kriteria" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="'.$data['id_kriteria'].'" data-op="kriteria" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>';
                                    }
                                    echo '</tr>';
                                    $no++;
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($_SESSION['role'] == 1 || $_SESSION['role'] == 3): ?>
<!-- Modal Add -->
<div class="modal" id="modal-add">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form class="form" method="post" action="./proses/prosestambah.php">
                <input type="hidden" name="op" value="kriteria">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Barang <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <select name="barang" class="form-control" required>
                                <option value="" disabled selected>-- Pilih--</option>
                                <?php
                                    $query = "SELECT id_jenisbarang, namaBarang FROM jenis_barang";
                                    $execute = $konek->query($query);
                                    if($execute->num_rows > 0){
                                        while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                            echo '<option value="'.$data['id_jenisbarang'].'">'.$data['namaBarang'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Kriteria <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input name="kriteria" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Atribut <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <select name="sifat" class="form-control" required>
                                <option value="" disabled selected>-- Pilih--</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button>
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form class="form" method="post" action="./proses/prosesubah.php">
                <input type="hidden" name="id" id="id_kriteria">
                <input type="hidden" name="op" value="kriteria">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Barang <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <select name="barang" class="form-control" id="id_jenisbarang" required>
                                <option value="" disabled selected>-- Pilih--</option>
                                <?php
                                    $query = "SELECT id_jenisbarang, namaBarang FROM jenis_barang";
                                    $execute = $konek->query($query);
                                    if($execute->num_rows > 0){
                                        while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                            echo '<option value="'.$data['id_jenisbarang'].'">'.$data['namaBarang'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Kriteria <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input name="kriteria" type="text" class="form-control" id="namaKriteria" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Atribut <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <select name="sifat" class="form-control" id="sifat" required>
                                <option value="" disabled selected>-- Pilih--</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button>
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>