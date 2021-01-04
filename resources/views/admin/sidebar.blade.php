<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logo.png') }}" class="img-fluid">
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>

            {{--                                //ELIMINAR COMENTARIOS DESPUES
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <a href="{{ url('logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>

            <div class="email">{{ Auth::users()->correo }}</div>

            --}}
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Home</a>
            </li>
            <li>
                <a href="{{ url('/admin/products') }}"><i class="fas fa-box"></i> Productos</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}" class ="lk-user_list lk-user_edit"><i class="fas fa-users"></i>Usuarios</a>
            </li>
            <li>
                <a href="{{ url('/admin/users/create') }}" class ="lk-user_list lk-user_edit"><i class="fas fa-users"></i>Crear Usuarios</a>
            </li>
        </ul>
    </div>
</div>
