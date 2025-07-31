<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard.index') }}">
                <img class="main-logo" src="{{ asset('backend/img/logo/logo.png') }}" alt="Logo" />
            </a>
            <strong>
                <a href="{{ route('admin.dashboard.index') }}">
                    <img src="{{ asset('backend/img/logo/logosn.png') }}" alt="Logo Small" />
                </a>
            </strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                        <a title="Dashboard" href="{{ route('admin.dashboard.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="{{ request()->routeIs('admin.dosen.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('admin.dosen.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-professor icon-wrap"></span> 
                            <span class="mini-click-non">Dosen</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Semua Dosen" href="{{ route('admin.dosen.index') }}"><span class="mini-sub-pro">Semua Dosen</span></a></li>
                            <li><a title="Tambah Dosen" href="{{ route('admin.dosen.create') }}"><span class="mini-sub-pro">Tambah Dosen</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ request()->routeIs('admin.mahasiswa.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('admin.mahasiswa.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-student icon-wrap"></span> 
                            <span class="mini-click-non">Mahasiswa</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Semua Mahasiswa" href="{{ route('admin.mahasiswa.index') }}"><span class="mini-sub-pro">Semua Mahasiswa</span></a></li>
                            <li><a title="Tambah Mahasiswa" href="{{ route('admin.mahasiswa.create') }}"><span class="mini-sub-pro">Tambah Mahasiswa</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ request()->routeIs('dosen.absen.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <span class="educate-icon educate-checked icon-wrap"></span>
                            <span class="mini-click-non">Absensi</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a title="Absen Dosen" href="{{ route('dosen.absen.dosen') }}">
                                    <span class="mini-sub-pro">Absen Dosen</span>
                                </a>
                            </li>
                            <li>
                                <a title="Absen Mahasiswa" href="{{ route('dosen.absen.mahasiswa') }}">
                                    <span class="mini-sub-pro">Absen Mahasiswa</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="{{ request()->routeIs('admin.matakuliah.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('admin.matakuliah.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-course icon-wrap"></span> 
                            <span class="mini-click-non">Matakuliah</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Semua Matakuliah" href="{{ route('admin.matakuliah.index') }}"><span class="mini-sub-pro">Semua Matakuliah</span></a></li>
                            <li><a title="Tambah Matakuliah" href="{{ route('admin.matakuliah.create') }}"><span class="mini-sub-pro">Tambah Matakuliah</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ request()->routeIs('admin.jadwal.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('admin.jadwal.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-event icon-wrap"></span> 
                            <span class="mini-click-non">Jadwal</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Semua Jadwal" href="{{ route('admin.jadwal.index') }}"><span class="mini-sub-pro">Semua Jadwal</span></a></li>
                            <li><a title="Tambah Jadwal" href="{{ route('admin.jadwal.create') }}"><span class="mini-sub-pro">Tambah Jadwal</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ request()->routeIs('admin.krs.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('admin.krs.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-library icon-wrap"></span> 
                            <span class="mini-click-non">KRS</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Semua KRS" href="{{ route('admin.krs.index') }}"><span class="mini-sub-pro">Semua KRS</span></a></li>
                            <li><a title="Tambah KRS" href="{{ route('admin.krs.create') }}"><span class="mini-sub-pro">Tambah KRS</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="{{ request()->routeIs('admin.ruang.*') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('admin.ruang.index') }}" aria-expanded="false">
                            <span class="educate-icon educate-department icon-wrap"></span> 
                            <span class="mini-click-non">Ruang</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Semua Ruang" href="{{ route('admin.ruang.index') }}"><span class="mini-sub-pro">Semua Ruang</span></a></li>
                            <li><a title="Tambah Ruang" href="{{ route('admin.ruang.create') }}"><span class="mini-sub-pro">Tambah Ruang</span></a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a title="Logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                            <span class="educate-icon educate-nav icon-wrap" aria-hidden="true"></span> 
                            <span class="mini-click-non">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->

<!-- Logout Form -->
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>