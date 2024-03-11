<div class="card-header">
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item {{ Route::is('main.menu') ? 'active' : '' }}">
            <b>
                <a href="{{ route('main.menu') }}" class="nav-link" aria-current="page" href="#">
                    <i class="fa-solid fa-house"></i>
                    Beranda
                </a>
            </b>
        </li>
        <li class="nav-item {{ Route::is('student.forum') ? 'active' : '' }}">
            <b>
                <a href="{{ route('student.forum') }}" class="nav-link" href="#">
                    <i class="fa-regular fa-comments"></i>
                    Obrolan
                </a>
            </b>
        </li>
        <li class="nav-item">
            <b>
                <a class="nav-link text-capitalize" href="#">
                    <i class="fa-regular fa-user"></i>
                    {{ auth()->user()->fullname }}
                </a>
            </b>
        </li>
    </ul>
</div>
