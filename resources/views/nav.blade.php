{{-- @dd(request()->path() == 'home') --}}
<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <span class="badge bg-success shadow">TODOLIST</span>
        </a>
        <ul class="navbar-nav ">
            <li class="nav-item "><a href="{{ url('/home') }}"
                    class="nav-link @if (request()->path() == 'home') active @endif  ">Toutes</a></li>
            <li class="nav-item "><a href="{{ url('/uncompleted') }}"
                    class="nav-link @if (request()->path() == 'uncompleted') active @endif ">En cours</a></li>
            <li class="nav-item "><a href="{{ url('/completed') }}"
                    class="nav-link @if (request()->path() == 'completed') active @endif ">Terminées</a></li>
        </ul>
    </div>
</nav>
