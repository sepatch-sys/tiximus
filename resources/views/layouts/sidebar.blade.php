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

                <!-- Ticket Management -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt text-danger"></i>
                        <p>
                            Ticket Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tickets.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Ticket List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-warning"></i>
                                <p>Add Ticket</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tourism Categories -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list text-info"></i>
                        <p>
                            Tourism Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category_tourism.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Tourism Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Province Categories -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-map-marker-alt text-primary"></i>
                        <p>
                            Province Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category_province.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Province List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category_province.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add Province Category</p>
                            </a>
                        </li>
                    </ul>
                </li>                
                <!-- Ticket Sales -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart text-orange"></i>
                        <p>Ticket Sales</p>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users text-purple"></i>
                        <p>User Management</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
