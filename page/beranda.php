<!-- Page Title, Breadcrumb -->
<div class="app-title">
    <div>
        <h1>Beranda</h1>
    </div>
    <div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
            <li class="breadcrumb-item"><a href="./?page=beranda">Beranda</a></li>
        </ul>
    </div>
</div>

<!-- Content -->
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-sm-auto align-self-center text-center">
                        <img src="asset/image/illustration/undraw_skateboard_d6or.svg" width="175" alt="Welcome">
                    </div>
                    <div class="col-sm mt-3 mt-sm-0">
                        <h5 class="mt-0">Hai, <?= $_SESSION['nama'] ?>!</h5>
                        <p class="mb-0">Selamat Datang di Sistem Pendukung Keputusan Pemilihan Supplier. Mohon digunakan dengan bijak ya!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-sm mt-3 mt-sm-0 order-2 order-sm-1">
                        <h5 class="mt-0">Panduan</h5>
                        <p>Apabila masih bingung mengenai cara menggunakan sistem ini, silahkan mengunduh panduan di bawah ini.</p>
                        <p class="mb-0"><a href="#" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-file-pdf-o mr-2"></i>Unduh Panduan</a></p>
                    </div>
                    <div class="col-sm-auto align-self-center text-center order-1 order-sm-2">
                        <img src="asset/image/illustration/undraw_instruction_manual_cyae.svg" width="175" alt="Instruction">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>