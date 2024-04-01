<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img src="{{asset('img/xcar.svg')}}" width="150" alt=""></h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="#" class="nav-item nav-link @if (request()->route()->getName() == 'partner.dashboard') active @endif"> <img style="margin-right: 10px" src="{{asset('images/Activity.svg')}}"> <span>Статистика</span></a>
            <a href="{{route('partner.form.index')}}" class="nav-item nav-link  @if (request()->route()->getName() == 'partner.form.index') active @endif"><img style="margin-right: 10px" src="{{asset('images/Profile.svg')}}"> <span>Анкеты</span></a>

            <a href="#" onclick="document.getElementById('logout-form').submit()" class="nav-item nav-link"><img style="margin-right: 10px" src="{{asset('images/Logout.svg')}}"><span>Выйти</span></a>
        </div>
    </nav>
</div>

<form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
<!-- Sidebar End -->
