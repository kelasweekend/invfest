<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin')}}" class="brand-link">
       <img src="{{ asset('backend/img/logo.png')}}" alt="" class="img-fluid">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('admin')}}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pembayaran.index')}}" class="nav-link {{ Request::segment(2) === 'pembayaran' ? 'active' : null }}">
                        <i class="nav-icon fas fa-money-bill-wave-alt"></i>
                        <p>Setting Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sponsor.index')}}" class="nav-link {{ Request::segment(2) === 'sponsor' ? 'active' : null }}">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>Sponsor Event</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('medpart.index')}}" class="nav-link {{ Request::segment(2) === 'medpart' ? 'active' : null }}">
                        <i class="nav-icon fas fa-ad"></i>
                        <p>Media Partner Event</p>
                    </a>
                </li>
                <li class="nav-header">Event Lomba</li>
                <li class="nav-item">
                    <a href="{{route('kategori.index')}}" class="nav-link {{ Request::segment(2) === 'kategori' ? 'active' : null }}">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>Kategori Lomba</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pendaftaran.index')}}" class="nav-link {{ Request::segment(2) === 'pendaftaran' ? 'active' : null }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Data Pendaftar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('timeline.index')}}" class="nav-link {{ Request::segment(2) === 'timeline' ? 'active' : null }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Timeline Lomba</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
