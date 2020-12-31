<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logo.png') }}" class="img-fluid">
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <a href="{{ url('logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="email">{{ Auth::usuarios()->correo }}</div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/productos') }}"><i class="fas fa-box"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/users') }}"><i class="fas fa-users"></i>Dashboard</a>
            </li>
        </ul>
    </div>
</div>
