<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="<?= base_url('admin/dokter') ?>">Dokter</a></li>
                <li><a href="<?= base_url('admin/pasien') ?>">Pasien</a></li>
            </ul>
        </div>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="<?= base_url('admin/home') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('admin/dokter') ?>">Dokter</a></li>
            <li><a href="<?= base_url('admin/pasien') ?>">Pasien</a></li>
            <li><a href="<?= base_url('admin/user') ?>">User</a></li>
            <li><a href="<?= base_url('admin/obat') ?>">Obat</a></li>
            <li><a href="<?= base_url('admin/resep') ?>">Resep</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        @if ($this->session->has_userdata('user_id'))
            <a class="btn" href="<?= base_url('logout') ?>">Logout</a>
        @else
            <a class="btn" href="<?= base_url('login') ?>">Login</a>
        @endif
    </div>
</div>
