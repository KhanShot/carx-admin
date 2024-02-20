<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img src="{{asset('img/xcar.svg')}}" width="150" alt=""></h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="{{route('admin.dashboard')}}" class="nav-item nav-link @if (request()->route()->getName() == 'admin.dashboard') active @endif"><i class="fa fa-tachometer-alt me-2"></i>Дашборд</a>

            <a href="{{route('admin.campaign.index')}}" class="nav-item nav-link @if (request()->route()->getName() == 'admin.campaign.index') active @endif"><i class="fa fa-building me-2"></i>Компании</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-pen-square me-2"></i>Анкеты</a>
{{--            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>--}}
            <a href="#" onclick="document.getElementById('logout-form').submit()" class="nav-item nav-link"><i class="fa fa-user-minus me-2"></i>Выйти</a>

        </div>
    </nav>
</div>

<form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
<!-- Sidebar End -->
