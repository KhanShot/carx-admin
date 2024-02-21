@extends('layouts.app')
@section('title')
    Создание компании
@endsection
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Создание компании</h1>
        <a href="{{route('admin.campaign.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-alt-circle-left fa-sm text-white-50 mr-2"></i> Назад</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="d-flex" action="{{route('admin.campaign.store')}}" method="post">
                @csrf
                <div class="col-md-3">
                    <div>Личные данные</div>
                    <hr>
                    <div class="form-group mb-3">
                        <label>Название компании</label>
                        <input type="text" class="form-control bg-white" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>БИН</label>
                        <input type="number" step="1" class="form-control bg-white" value="{{old('bin')}}" name="bin" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Почта(логин)</label>
                        <input type="email" class="form-control bg-white" value="{{old('email')}}" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Пароль</label>
                        <input type="text" class="form-control bg-white" value="{{old('password')}}" name="password" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Цена за лид</label>
                        <input type="number" step="0.1" class="form-control bg-white" value="{{old('lead_point')}}" name="lead_point" required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div>Контактные данные</div>
                    <hr>
                    <div class="form-group mb-3">
                        <label>Адресс</label>
                        <input type="text" class="form-control bg-white" value="{{old('address')}}" name="address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Сайт</label>
                        <input type="text" step="1" class="form-control bg-white" value="{{old('website')}}" name="website" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Номер телефона</label>
                        <input type="text" class="form-control bg-white" value="{{old('phone')}}" name="phone" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Телеграм аккаунт</label>
                        <input type="text" class="form-control bg-white" value="{{old('telegram')}}" name="telegram" required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div>Данные для фильтра</div>
                    <hr>
                    <div class="form-group mb-3">
                        <label>Мин год авто</label>
                        <input type="number" step="1" class="form-control bg-white" value="{{old('min_year')}}" name="min_year">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-group mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="pledged" @if(old('pledged') && old('pledged')=='on') checked @endif name="pledged">
                                <label class="form-check-label" for="pledged">Залоговое авто</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="arrested" @if(old('arrested') && old('arrested')=='on') checked @endif name="arrested">
                                <label class="form-check-label" for="arrested">В аресте</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-group mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="crashed" @if(old('crashed') && old('crashed')=='on') checked @endif name="crashed">
                                <label class="form-check-label" for="crashed">Аварийное авто</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="right_hand" @if(old('right_hand') && old('right_hand')=='on') checked @endif name="right_hand">
                                <label class="form-check-label" for="right_hand">Праворульные</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="in_kz" @if(old('in_kz') && old('in_kz')=='on') checked @endif name="in_kz">
                            <label class="form-check-label" for="in_kz">Не зарегистрированные в РК</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end mt-5">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Создать</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
