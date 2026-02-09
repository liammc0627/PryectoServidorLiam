<div class="header">
        <svg style="height: 100px" style="float: left;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z"/></svg>
        <a href="{{route('inicio')}}">
        <img src="/img/logoBarcelona.png" id="logo" alt="Logo FC Barcelona">
        </a>
        <div class="auth-links">
            @guest
                <a href="{{ route('loginForm') }}" class="link-auth">Iniciar Sesión</a>
                <a href="{{ route('signupForm') }}" class="link-auth">Registrate</a>
            @else
                <div class="user-info">
                    <span style="color: #fff; margin-right:10px;">Hola, {{ Auth::user()->username }}@if(Auth::user()->role === 'admin') (Admin)@endif</span>
                    <a href="{{ route('users.account') }}" class="link-auth">Mi cuenta</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="link-auth">Cerrar sesión</button>
                    </form>
                </div>
            @endguest
        </div>
</div>
<div class="navegador">
<nav>
            <ul class="lista">
                <li><a href="{{route('inicio')}}">Inicio</a></li>
                <li><a href="{{route('players.index')}}">Jugadores</a></li>
                <li><a href="{{route('events.index')}}">Eventos</a></li>
                <li>Tienda</li>
                <li><a href="{{route('contact.create')}}">Contacto</a></li>
                <li><a href="{{route('dondeestamos')}}">Donde estamos</a></li>
            </ul>
</nav>
</div>
