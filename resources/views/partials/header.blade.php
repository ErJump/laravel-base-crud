<header>
    <nav class="px-5 navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand fs-3" href="{{route('comics.index')}}">Comics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link {{ request()->routeIs('comics.index') ? 'ms_active' : ''}}" href="{{route('comics.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('comics.create') ? 'ms_active' : ''}}" href="{{route('comics.create')}}">Add New Comic</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> --}}
            </ul>
        </div>
    </nav>
</header>