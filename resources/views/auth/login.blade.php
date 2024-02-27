@extends('layouts.app')
@section('title')
    Вход
@endsection
@section('content')
    <!-- Sign In Start -->
    <div class="container justify-content-center align-items-center">
        <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 90vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" class="">
                            <h3 class="text-primary"><img src="{{asset('img/xcar.svg')}}" width="150" alt=""></h3>
                        </a>
                    </div>
                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="name@example.com">
                            <label for="floatingInput" style="padding-left: 25px">Почта</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control " name="password" required placeholder="Password">
                            <label for="floatingPassword" style="padding-left: 25px">Пароль</label>
                            <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" style="padding-left: 10px" for="exampleCheck1">Запомнить</label>
                            </div>
                            <a href="">Забыл пароль</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Вход</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
@endsection
