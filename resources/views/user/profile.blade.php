
Salom Customer
@auth
    <form class="d-block" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item"><i class="feather-log-out"></i>
            Выйти
        </button>
    </form>
@endauth
