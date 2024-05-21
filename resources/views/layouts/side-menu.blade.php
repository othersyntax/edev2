<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset("/template/img/usupkeram.jpeg") }}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Usup bin Keram</span>
                        <span class="text-muted text-xs block">Pentadbir <b class="caret"></b></span>
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
            <li>
                <a href="/dashboard"><i class="fa fa-vcard-o"></i> <span class="nav-label">Permohonan</span>  </a>
            </li>
            <li class="{{ (request()->segment(1) == 'siling') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">Siling</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'penetapan') ? 'active' : '' }}"><a href="#">Penetapan</a></li>
                    <li class="{{ (request()->segment(2) == 'selenggara') ? 'active' : '' }}"><a href="#">Selenggara</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Pengesahan</span>  </a>
            </li>
            <li class="{{ (request()->segment(1) == 'pentadbiran') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Pentadbiran</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ (request()->segment(2) == 'negeri') ? 'active' : '' }}"><a href="/pentadbiran/negeri">Negeri</a></li>
                    <li class="{{ (request()->segment(2) == 'daerah') ? 'active' : '' }}"><a href="/pentadbiran/daerah">Daerah</a></li>
                    <li class="{{ (request()->segment(2) == 'bandar') ? 'active' : '' }}"><a href="/pentadbiran/bandar">Mukim / Bandar</a></li>
                    <li class="{{ (request()->segment(2) == 'fasiliti') ? 'active' : '' }}"><a href="/pentadbiran/fasiliti">Fasiliti</a></li>
                    <li class="{{ (request()->segment(2) == 'kategori-fasiliti') ? 'active' : '' }}"><a href="/pentadbiran/kategori-fasiliti">Jenis Fasiliti</a></li>
                    <li class="{{ (request()->segment(2) == 'pengguna') ? 'active' : '' }}"><a href="/pentadbiran/pengguna">Pengguna</a></li>
                    <li class="{{ (request()->segment(2) == 'peranan') ? 'active' : '' }}"><a href="/pentadbiran/peranan">Peranan</a></li>
                    <li class="{{ (request()->segment(2) == 'capaian') ? 'active' : '' }}"><a href="/pentadbiran/capaian">Tahap Capaian</a></li>
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
            <li>
                <a href="{{ route('logout') }}" ><i class="fa fa-sign-out"></i> <span class="nav-label">Log-keluar</span></a>
            </li>            
        </ul>

    </div>
</nav>