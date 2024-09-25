<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset("/template/img/".auth()->user()->image) }}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>
                        <span class="text-muted text-xs block">{{ getRole(auth()->user()->role) }} <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    eDE
                </div>
            </li>
            <li>
                <a href="/dashboard"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span>  </a>
            </li>

            <li class="{{ (request()->segment(1) == 'permohonan') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-vcard-o"></i> <span class="nav-label">Permohonan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'baru') ? 'active' : '' }}"><a href="/permohonan/baru/main">Siling</a></li>
                    <li class="{{ (request()->segment(2) == 'kecemasan') ? 'active' : '' }}"><a href="/permohonan/kecemasan/main">Luar Siling</a></li>
                    @if (auth()->user()->role==2 || auth()->user()->role==3)
                    <li class="{{ (request()->segment(2) == 'semak') ? 'active' : '' }}"><a href="/permohonan/semak/main">Pengurusan</a></li>
                    @endif
                </ul>
            </li>
            <li class="{{ (request()->segment(1) == 'projek') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Pemantauan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'senarai') ? 'active' : '' }}"><a href="/projek/senarai">Projek</a></li>
                    <li class="{{ (request()->segment(2) == 'baki') ? 'active' : '' }}"><a href="/projek/baki/tambah">Baki Peruntukan</a></li>
                    {{-- <li class="{{ (request()->segment(2) == 'penjimatan') ? 'active' : '' }}"><a href="/projek/penjimatan/tambah">Penjimatan</a></li>
                    <li class="{{ (request()->segment(2) == 'tajuk') ? 'active' : '' }}"><a href="/permohonan/tajuk/senarai">Tukar Tajuk</a></li>
                    <li class="{{ (request()->segment(2) == 'pulang') ? 'active' : '' }}"><a href="/projek/pulang">Tarik Balik</a></li> --}}
                </ul>
            </li>
            {{-- <li class="{{ (request()->segment(1) == 'pengesahan') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Pengesahan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'penjimatan') ? 'active' : '' }}"><a href="/pengesahan/penjimatan/senarai">Penjimatan</a></li>
                    <li class="{{ (request()->segment(2) == 'tukar') ? 'active' : '' }}"><a href="/pengesahan/tajuk/senarai">Tukar Tajuk</a></li>
                </ul>
            </li> --}}
            {{-- <li class="{{ (request()->segment(1) == 'siling') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">Siling</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'senarai') ? 'active' : '' }}"><a href="/siling/senarai">Senarai</a></li>
                    <li class="{{ (request()->segment(2) == 'selenggara') ? 'active' : '' }}"><a href="#">Selenggara</a></li>
                </ul>
            </li> --}}
            @if (auth()->user()->role==2 || auth()->user()->role==3)
            <li class="{{ (request()->segment(1) == 'pentadbiran') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Pentadbiran</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'negeri') ? 'active' : '' }}"><a href="/pentadbiran/negeri">Negeri</a></li>
                    <li class="{{ (request()->segment(2) == 'daerah') ? 'active' : '' }}"><a href="/pentadbiran/daerah">Daerah</a></li>
                    <li class="{{ (request()->segment(2) == 'bandar') ? 'active' : '' }}"><a href="/pentadbiran/bandar">Mukim / Bandar</a></li>
                    <li class="{{ (request()->segment(2) == 'program') ? 'active' : '' }}"><a href="/pentadbiran/program">Program</a></li>
                    <li class="{{ (request()->segment(2) == 'fasiliti') ? 'active' : '' }}"><a href="/pentadbiran/fasiliti">Fasiliti</a></li>
                    <li class="{{ (request()->segment(2) == 'kategori-fasiliti') ? 'active' : '' }}"><a href="/pentadbiran/kategori-fasiliti">Kategori Fasiliti</a></li>
                    <li class="{{ (request()->segment(2) == 'kategori-projek') ? 'active' : '' }}"><a href="/pentadbiran/kategori-projek">Kategori Projek</a></li>
                    <li class="{{ (request()->segment(2) == 'senarai') ? 'active' : '' }}"><a href="/siling/senarai">Penetapan Siling</a></li>
                    {{-- <li class="{{ (request()->segment(2) == 'pengguna') ? 'active' : '' }}"><a href="/pentadbiran/pengguna">Pengguna</a></li>
                    <li class="{{ (request()->segment(2) == 'peranan') ? 'active' : '' }}"><a href="/pentadbiran/peranan">Peranan</a></li>
                    <li class="{{ (request()->segment(2) == 'capaian') ? 'active' : '' }}"><a href="/pentadbiran/capaian">Tahap Capaian</a></li> --}}
                </ul>
            </li>
            <li class="{{ (request()->segment(1) == 'akses') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Akses</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'roles') ? 'active' : '' }}"><a href="/akses/roles">Peranan</a></li>
                    <li class="{{ (request()->segment(2) == 'permissions') ? 'active' : '' }}"><a href="/akses/permissions">Capaian</a></li>
                    <li class="{{ (request()->segment(2) == 'users') ? 'active' : '' }}"><a href="/akses/users">Pengguna</a></li>
                </ul>
            </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" ><i class="fa fa-sign-out"></i> <span class="nav-label">Log-keluar</span></a>
            </li>
        </ul>

    </div>
</nav>
