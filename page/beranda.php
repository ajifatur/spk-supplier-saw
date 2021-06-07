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
        <div class="alert alert-success text-center mb-0">
            Selamat Datang, <span class="text-dark font-weight-bold"><?= ucfirst($_SESSION['user']) ?></span> di Sistem Pendukung Keputusan pemilihan supplier berbasis web menggunakan metode <span class="text-dark font-weight-bold">Simple Additive Weighting</span>.
        </div>
    </div>
</div>