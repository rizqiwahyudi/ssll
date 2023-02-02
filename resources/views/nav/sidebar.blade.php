<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/brand/HRM-1.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fa-home text-blue"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    @can('user-list')
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-user" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-user">
                                <i class="ni ni-circle-08 text-orange"></i>
                                <span class="nav-link-text">User</span>
                            </a>
                            <div class="collapse" id="navbar-user">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link">User Management</a>
                                    </li>
                                    @can('role-list')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link">Role & Permission</a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcan
                    @can('kategori-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kategoris.index') }}">
                                <i class="fa fa-list text-green"></i>
                                <span class="nav-link-text">Kategori</span>
                            </a>
                        </li>
                    @endcan
                    @can('pertanyaan-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pertanyaans.index') }}">
                                <i class="fa fa-question-circle text-yellow"></i>
                                <span class="nav-link-text">Pertanyaan</span>
                            </a>
                        </li>
                    @endcan
                    @can('sekolah-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sekolahs.index') }}">
                                <i class="fa fa-graduation-cap text-info"></i>
                                <span class="nav-link-text">Sekolah</span>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departements.index') }}">
                            <i class="fa fa-university text-primary"></i>
                            <span class="nav-link-text">Instansi</span>
                        </a>
                    </li>
                    @hasrole('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trashs.index') }}">
                            <i class="fas fa-trash-alt text-gray"></i>
                            <span class="nav-link-text">Trash</span>
                        </a>
                    </li>
                    @endhasrole
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-setting" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-setting">
                            <i class="ni ni-settings-gear-65 text-default"></i>
                            <span class="nav-link-text">Setting</span>
                        </a>
                        <div class="collapse" id="navbar-setting">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cleaner') }}" class="nav-link">Cleaner</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
