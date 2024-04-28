{{-- @dd(request()->path() == 'home') --}}
<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <span class="badge bg-success shadow">TODOLIST</span>
        </a>
        <ul class="navbar-nav ">
            <li class="nav-item "><a href="{{ url('/home') }}"
                    class="nav-link @if (request()->path() == 'home') active @endif  ">Toutes</a></li>
            <li class="nav-item "><a href="{{ url('/myhome') }}"
                    class="nav-link @if (request()->path() == 'myhome') active @endif  ">Mes tâches</a></li>
            <li class="nav-item "><a href="{{ url('/uncompleted') }}"
                    class="nav-link @if (request()->path() == 'uncompleted') active @endif ">En cours</a></li>
            <li class="nav-item "><a href="{{ url('/completed') }}"
                    class="nav-link @if (request()->path() == 'completed') active @endif ">Terminées</a></li>
            @if (Route::has('login'))
                @auth
            <li>
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
            </li> @else
            <li>
               <a href="{{ route('login') }}" class="nav-link">Log in</a>
            </li>
                @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
                    @endif
                @endauth
                </div>
            @endif

        </ul>
    </div>
</nav>
