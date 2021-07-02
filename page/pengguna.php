<!-- Page Title, Breadcrumb -->
<div class="app-title">
    <div>
        <h1>Pengguna</h1>
    </div>
    <div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
            <li class="breadcrumb-item"><a href="./?page=pengguna">Pengguna</a></li>
        </ul>
    </div>
</div>

<!-- Content -->
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?php if($_SESSION['role'] == 1): ?>
            <div class="tile-title-w-btn">
                <a href="#" class="btn btn-sm btn-primary btn-add"><i class="fa fa-plus mr-2"></i>Tambah Data</a>
            </div>
            <?php endif; ?>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th width="30">No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th width="100">Role</th>
            					<?php if($_SESSION['role'] == 1): ?>
                                <th width="50">Opsi</th>
								<?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM user ORDER BY role ASC, nama ASC";
                            $execute = $konek->query($query);
                            if($execute->num_rows > 0){
                                $no = 1;
                                while($data = $execute->fetch_array(MYSQLI_ASSOC)){
                                    switch($data['role']){
                                        case 1: $role = 'Admin'; break;
                                        case 2: $role = 'Manajer'; break;
                                        default: $role = ''; break;
                                    }
                                    if($data['id'] == $_SESSION['id'])
                                        $delete = 'btn-forbidden-own';
                                    elseif($data['id'] == 1)
                                        $delete = 'btn-forbidden';
                                    else
                                        $delete = 'btn-delete';
                                    echo '
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$data['nama'].'</td>
                                        <td>'.$data['username'].'</td>
                                        <td>'.$role.'</td>
									';
									if($_SESSION['role'] == 1):
                                    echo '
										<td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-warning btn-edit" data-id="'.$data['id'].'" data-op="pengguna" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger '.$delete.'" data-id="'.$data['id'].'" data-op="pengguna" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>';
									endif;
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

<?php if($_SESSION['role'] == 1): ?>
<!-- Modal Add -->
<div class="modal" id="modal-add">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form class="form" method="post" action="./proses/prosestambah.php">
                <input type="hidden" name="op" value="pengguna">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input name="nama" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Username <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input name="username" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Password <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control">
                                <div class="input-group-append">
                                    <a href="#" class="input-group-text text-dark btn btn-toggle-password"><i class="fa fa-eye mr-0"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Role <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <select name="role" class="form-control" required>
                                <option value="" disabled selected>-- Pilih--</option>
                                <option value="1">Admin</option>
                                <option value="2">Manajer</option>
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
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="op" value="pengguna">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input name="nama" type="text" class="form-control" id="nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Username <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input name="username" type="text" class="form-control" id="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Password <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control">
                                <div class="input-group-append">
                                    <a href="#" class="input-group-text text-dark btn btn-toggle-password"><i class="fa fa-eye mr-0"></i></a>
                                </div>
                            </div>
                            <div class="small text-muted mt-1">Kosongi saja jika tidak ingin mengganti password.</div>
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