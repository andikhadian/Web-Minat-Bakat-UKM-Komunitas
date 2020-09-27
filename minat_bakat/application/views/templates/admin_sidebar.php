<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('Admin/Dashboard'); ?>">LMB FTI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('Admin/Dashboard'); ?>">LMB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin</li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/Dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/Profil') ?>" class="nav-link"><i class="fas fa-user-circle"></i> <span>Profil Saya</span></a>
            </li>
            <li class="menu-header">Menu Utama</li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/User') ?>" class="nav-link"><i class="fas fa-users"></i> <span>User</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/Organisasi') ?>" class="nav-link"><i class="fas fa-university"></i> <span>Organisasi</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/Galeri') ?>" class="nav-link"><i class="fas fa-images"></i> <span>Galeri Kegiatan</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/Pendaftaran') ?>" class="nav-link"><i class="fas fa-list"></i> <span>Pendaftaran Peserta</span></a>
            </li>
            <li class="menu-header">Lainnya</li>
            <li class="nav-item">
                <a href="<?= base_url('') ?>" class="nav-link"><i class="fas fa-home"></i> <span>Lihat Homepage</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-info-circle"></i> <span>Tentang</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('Admin/Tentang') ?>">Tentang FTI</a></li>
                    <li><a class="nav-link" href="<?= base_url('Admin/Tentang/perkenalan') ?>">Tentang Minat dan Bakat</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/Kontak') ?>" class="nav-link"><i class="fas fa-phone"></i> <span>Kontak</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>