<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('storage/grafitexLogo.png')}}" alt="Grafitex Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Grafitex</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item has-treeview menu-open"> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-campground "></i>
                        {{-- <p>Campañas<i class="right fas fa-angle-left"></i></p> --}}
                        <p>Campañas</p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('campaign.index')}}" class="nav-link active">
                                <i class="fas fa-list-ul nav-icon"></i><p>Listado Campañas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('campaign.filtrar')}}" class="nav-link active">
                                <i class="fas fa-filter nav-icon"></i><p>Filtros</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('campaign.resumen')}}" class="nav-link active">
                                <i class="fab fa-delicious nav-icon"></i><p>Filtros</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>