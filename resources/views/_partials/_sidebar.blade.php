<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('storage/grafitexLogo.png')}}" alt="Grafitex Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Grafitex</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul id="main-menu" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('campaign.index') }}" id="menucampaign" class="nav-link">
                        <i class="nav-icon fas fa-campground "></i>
                        <p>Campañas </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tarifa.index') }}" id="menutarifa" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Tarifas</p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" id="menumantenimiento" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Mantenimiento
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" id="menustores" class="nav-link">
                                <i class="nav-icon fas fa-store"></i>
                                <p>Stores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" id="menuelementos" class="nav-link">
                                <i class="nav-icon far fas fa-cubes"></i>
                                <p>Elementos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" id="menumateriales" class="nav-link">
                                <i class="nav-icon fas fa-cube"></i>
                                <p>Materiales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" id="menudirecciones" class="nav-link">
                                <i class="nav-icon fas fa-map-marker"></i>
                                <p>Direcciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('maestro.index') }}" id="menumaestro" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Maestro</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>