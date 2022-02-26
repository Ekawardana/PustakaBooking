<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center pb-3" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book ml-2"></i>
        </div>
        <div class="sidebar-brand-text">Pustaka Booking</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Looping Menu-->

    <!-- Kelola Data -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
            <i class="fa fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
            <i class="fa fa-fw fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Kelola Data -->
    <div class="sidebar-heading">
        Kelola Data
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('buku'); ?>">
            <i class="fa fa-fw fa-book"></i>
            <span>Data Buku</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('kategori'); ?>">
            <i class="fas fa-swatchbook"></i>
            <span>Data Kategori</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('user/anggota'); ?>">
            <i class="fa fa-fw fa-users"></i>
            <span>Data Anggota</span>
        </a>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Kelola Transaksi -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('pinjam/daftarBooking'); ?>">
            <i class="fas fa-list-alt"></i>
            <span>Daftar Booking</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('pinjam'); ?>">
            <i class="fas fa-shopping-bag"></i>
            <span>Data Peminjaman</span>
        </a>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Kelola Data -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_buku'); ?>">
            <i class="fa fa-fw fa-book"></i>
            <span>Laporan Data Buku</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_anggota'); ?>">
            <i class="fa fa-fw fa-address-book"></i>
            <span>Laporan Data Anggota</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_pinjam'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Laporan Data Peminjaman</span>
        </a>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -- > 