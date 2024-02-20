@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Формы</h1>
{{--        <a href="{{route('admin.campaign.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                class="fas fa-user-plus fa-sm text-white-50 mr-2"></i> Создать</a>--}}
    </div>

    @include('inc.alert')
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">БИН</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Баланс</th>
                    <th scope="col">Фильтр</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($campaigns=[] as $campaign)
                    <tr>
                        <td scope="row">{{$campaign->id}}</td>
                        <td>{{$campaign->user->name ?? ''}}</td>
                        <td>{{$campaign->bin ?? ''}}</td>
                        <td>{{$campaign->address}}</td>
                        <td>{{$campaign->phone}}</td>
                        <td> 0 </td>
                        <td>
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <div style="margin-right: 10px">Мин год: {{$campaign->min_year}} |</div>
                                    <div>Залоговое авто: {{$campaign->pledged ? 'Да' : 'Нет'}}</div>
                                </div>
                                <div class="d-flex">
                                    <div style="margin-right: 10px">В аресте: {{$campaign->arrested ? 'Да' : 'Нет'}} |</div>
                                    <div>Аварийное авто: {{$campaign->crashed ? 'Да' : 'Нет'}}</div>
                                </div>
                                <div class="d-flex">
                                    <div style="margin-right: 10px">Праворульные: {{$campaign->right_hand ? 'Да' : 'Нет'}} |</div>
                                    <div>Зарегистрированные в КЗ: {{$campaign->in_kz ? 'Да' : 'Нет'}}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning">
                                <i class="fa fa-user-edit text-white"></i></a>
                            <a href="#" class="btn btn-info" >
                                <i class="fa fa-cash-register text-white"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
