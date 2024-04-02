@extends('layouts.app')
@section('title')
    Статистика
@endsection
@section('content')

    <!-- Sale & Revenue Start -->
{{--    <div class="container-fluid pt-4 px-4">--}}
{{--        <div class="row g-4">--}}
{{--            <div class="col-sm-6 col-xl-3">--}}
{{--                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">--}}
{{--                    <i class="fa fa-chart-line fa-3x text-primary"></i>--}}
{{--                    <div class="ms-3">--}}
{{--                        <p class="mb-2">Общий заработок</p>--}}
{{--                        <h6 class="mb-0">100000 ₸</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 col-xl-3">--}}
{{--                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">--}}
{{--                    <i class="fa fa-user-friends fa-3x text-primary"></i>--}}
{{--                    <div class="ms-3">--}}
{{--                        <p class="mb-2">Кол-во анкет</p>--}}
{{--                        <h6 class="mb-0">100</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 col-xl-3">--}}
{{--                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">--}}
{{--                    <i class="fa fa-business-time fa-3x text-primary"></i>--}}
{{--                    <div class="ms-3">--}}
{{--                        <p class="mb-2">Кол-во компании</p>--}}
{{--                        <h6 class="mb-0">1</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 col-xl-3">--}}
{{--                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">--}}
{{--                    <i class="fa fa-cash-register fa-3x text-primary"></i>--}}
{{--                    <div class="ms-3">--}}
{{--                        <p class="mb-2">Среднее стоимость лида</p>--}}
{{--                        <h6 class="mb-0">1500 ₸</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Sale & Revenue End -->


    <!-- Sales Chart Start -->
{{--    <div class="container-fluid pt-4 px-4">--}}
{{--        <div class="row g-4">--}}
{{--            <div class="col-sm-12 col-xl-6">--}}
{{--                <div class="bg-light text-center rounded p-4">--}}
{{--                    <div class="d-flex align-items-center justify-content-between mb-4">--}}
{{--                        <h6 class="mb-0">Анкеты по дням</h6>--}}
{{--                        <a href="">Все</a>--}}
{{--                    </div>--}}
{{--                    <canvas id="worldwide-sales"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-12 col-xl-6">--}}
{{--                <div class="bg-light text-center rounded p-4">--}}
{{--                    <div class="d-flex align-items-center justify-content-between mb-4">--}}
{{--                        <h6 class="mb-0">Транзакции по дням</h6>--}}
{{--                        <a href="">Все</a>--}}
{{--                    </div>--}}
{{--                    <canvas id="salse-revenue"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Sales Chart End -->

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0">Информация</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border-bottom border-1 border-dark d-flex mb-3">Личные данные</div>
                            <div class="text-start">
                                Название компании: {{$campaign->user->name ?? ''}}
                            </div>
                            <div class="text-start">
                                <span>БИН: {{$campaign->bin ?? ''}}</span>
                            </div>
                            <div class="text-start">
                                <span>Почта: {{$campaign->user->email ?? ''}}</span>
                            </div>
                            <div class="text-start">
                                <span>Цена за лид: {{$campaign->lead_point . ' Тг' ?? ''}}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border-bottom border-1 border-dark d-flex mb-3">
                                Контактные данные</div>
                            <div class="text-start">
                                Город: {{$campaign->city ?? ''}}
                            </div>
                            <div class="text-start">
                                <span>Адрес: {{$campaign->address ?? ''}}</span>
                            </div>
                            <div class="text-start">
                                <span>Номер телефона: {{$campaign->phone ?? ''}}</span>
                            </div>
                            <div class="text-start">
                                <span>Телеграм аккаунт: {{$campaign->telegram ?? ''}}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border-bottom border-1 border-dark d-flex mb-3">Данные для фильтра</div>
                            <div class="text-start">
                                Мин год авто: {{$campaign->min_year .'г' ?? ''}}
                            </div>
                            <div class="text-start">
                                <span>Залоговое авто: {{$campaign->pledged ? 'Да' : 'Нет'}}</span>
                            </div>
                            <div class="text-start">
                                <span>В аресте: {{$campaign->arrested ? 'Да' : 'Нет'}}</span>
                            </div>
                            <div class="text-start">
                                <span>Состояние: {{$campaign->crashed ? 'Авариное' : 'На ходу'}}</span>
                            </div>
                            <div class="text-start">
                                <span>Руль: {{$campaign->right_hand ? 'Справа' : 'Оба'}}</span>
                            </div>
                            <div class="text-start">
                                <span>Растаможен в РК: {{$campaign->in_kz ? 'Да' : 'Нет'}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
