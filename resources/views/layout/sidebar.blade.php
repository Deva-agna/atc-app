<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="./assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item  active ">
                    <a class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }} " href="{{route('dashboard')}}">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                @if(auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ 'user' == request()->path() ? 'active' : '' }} " href="{{route('user')}}">
                        <i class="ni ni-single-02 text-blue"></i> Master User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'pengujian' == request()->path() ? 'active' : '' }} " href="{{route('pengujian')}}">
                        <i class="ni ni-bullet-list-67 text-yellow"></i> Pengujian
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'user')
                <li class="nav-item">
                    <a class="nav-link {{ 'atc' == request()->path() ? 'active' : '' }} " href="{{route('atc')}}">
                        <i class="ni ni-book-bookmark text-orange"></i> ATC - Log Book
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'pengujian/list' == request()->path() ? 'active' : '' }} " href="{{route('pengujian-list')}}">
                        <i class="ni ni-bullet-list-67 text-yellow"></i> Pengujian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'pengujian/atc/performance/cek' == request()->path() ? 'active' : '' }} " href="{{route('pengujian-atc-performance-cek')}}">
                        <i class="ni ni-settings-gear-65 text-red"></i> ATC - Performance Cek
                    </a>
                </li>
                @endif
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button style="border: 0; background-color: transparent; cursor: pointer;" class="nav-link " href="./examples/tables.html">
                            <i class="fas fa-solid fa-arrow-left text-red"></i>Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>