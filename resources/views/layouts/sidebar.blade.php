<aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-bold text-light">Tiximus</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt text-primary"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Manajemen Tiket -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt text-danger"></i>
                        <p>
                            Manajemen Tiket
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tickets.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Daftar Tiket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-warning"></i>
                                <p>Tambah Tiket</p>
                            </a>
                        </li>
                    </ul>                    
                </li>                

                <!-- Kategori Wisata -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list text-info"></i>
                        <p>
                            Kategori wisata
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kategori.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Kategori Wisata</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-map-marker-alt text-primary"></i>
                        <p>
                            Kategori Provinsi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kategori_provinsi.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Kategori Provinsi</p>
                            </a>
                        </li>
                    </ul>
                </li>                

                <!-- Penjualan Tiket -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart text-orange"></i>
                        <p>Penjualan Tiket</p>
                    </a>
                </li>

                <!-- Manajemen User -->
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users text-purple"></i>
                        <p>Manajemen User</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div> 
</aside>
