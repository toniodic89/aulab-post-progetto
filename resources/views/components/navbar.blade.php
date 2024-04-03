
    <nav class="navbar navbar-expand-lg bg-nav">

        <div class="container-fluid">
            <a href="{{ route('homepage')}}"><img src="{{ asset('img/theaulabpost.png')}}" alt="{{ config('app.name')}}" width="75" height="80" class=" mt-1 "></a>
            <a class="navbar-brand ms-3" href="{{route('homepage')}}"> The Aulab Post</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarSupportedContent">

                <ul class=" navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class=" nav-item ">
                        <a class=" nav-link " href="{{ route('article.create')}}">Inserisci un articolo</a>
                    </li>
                    <li class=" nav-item ">
                        <a class=" nav-link " href="{{ route('article.index')}}">Tutti gli articoli</a>
                    </li>


                @auth

                    <li class=" nav-item">
                        <a class=" nav-link " href="{{ route('careers')}}">Lavora con noi</a>
                    </li>
                        @if (Auth::user()->is_admin)
                            <li class=" nav-item ">
                            <a class=" nav-link " href="{{ route('admin.dashboard')}}">Dashboard Admin</a>
                            </li>
                        @endif


                        @if (Auth::user()->is_revisor)
                            <li class=" nav-item ">
                            <a class=" nav-link " href="{{ route('revisor.dashboard')}}">Dashboard del revisore</a>
                            </li>
                        @endif

                        @if (Auth::user()->is_writer)
                            <li class=" nav-item ">
                            <a class=" nav-link " href="{{ route('writer.dashboard')}}">Dashboard del redattore</a>
                            </li>
                        @endif


                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Benvenuto {{Auth::user()->name}}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('article.byEditor', ['user'=> Auth::id()])}}">Profilo</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>

                                <form method="post" action="{{route('logout')}}" id="form-logout" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                @endauth

        @guest
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Benvenuto Ospite
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                    <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                </ul>
            </div>
        @endguest


    </ul>
                <form class="d-flex float-end " method="GET" action="{{ route ('article.search')}}">
                    <input class="form-control me-2" type="search" placeholder="Cosa stai cercando?" aria-label="Search" name="query">
                    <button class="btn btn-outline-light " type="submit">Cerca</button>
                </form>
            </div>
        </div>
</nav>


