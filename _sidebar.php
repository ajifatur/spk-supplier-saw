
    <!-- Sidebar Menu -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li class="app-sidebar__logo">
                <a class="app-menu__item p-0" href="index.php">
                    <img class="img-fluid logo-big" src="asset/logo/sidebar-logo.png">
                    <img class="img-fluid logo-small" src="asset/logo/fav-bm1.png" width="30">
                </a>
            </li>
            <hr>
            <li><a class="app-menu__item <?= !isset($_GET['page']) || $_GET['page'] == 'beranda' ? 'active' : '' ?>" href="./?page=beranda"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Beranda</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'barang' ? 'active' : '' ?>" href="./?page=barang"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Barang</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'supplier' ? 'active' : '' ?>" href="./?page=supplier"><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">Supplier</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'kriteria' ? 'active' : '' ?>" href="./?page=kriteria"><i class="app-menu__icon fa fa-check-square"></i><span class="app-menu__label">Kriteria</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'subkriteria' ? 'active' : '' ?>" href="./?page=subkriteria"><i class="app-menu__icon fa fa-check-square-o"></i><span class="app-menu__label">Sub Kriteria</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'bobot' ? 'active' : '' ?>" href="./?page=bobot"><i class="app-menu__icon fa fa-balance-scale"></i><span class="app-menu__label">Bobot</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'penilaian' ? 'active' : '' ?>" href="./?page=penilaian"><i class="app-menu__icon fa fa-star"></i><span class="app-menu__label">Penilaian</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'hasil' ? 'active' : '' ?>" href="./?page=hasil"><i class="app-menu__icon fa fa-bar-chart"></i><span class="app-menu__label">Hasil</span></a></li>
            <li><a class="app-menu__item <?= isset($_GET['page']) && $_GET['page'] == 'pengguna' ? 'active' : '' ?>" href="./?page=pengguna"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Pengguna</span></a></li>
        </ul>
    </aside>