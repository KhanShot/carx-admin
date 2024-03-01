@extends('layouts.app')
@section('title')
    Компании
@endsection
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Компании</h1>
        <a href="{{route('admin.campaign.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-user-plus fa-sm text-white-50 mr-2"></i> Создать</a>
    </div>

    @include('inc.alert')
    <div class="card">
        <div class="card-body table-responsive">
            <table id="table" class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">БИН</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Цена за лид</th>
                    <th scope="col">Год выпуска</th>
                    <th scope="col">В залоге</th>
                    <th scope="col">В аресте</th>
                    <th scope="col">Состояние</th>
                    <th scope="col">Руль</th>
                    <th scope="col">Расстаможен</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($campaigns as $campaign)
                    <tr>
                        <td scope="row">{{$campaign->id}}</td>
                        <td>{{$campaign->user->name ?? ''}}</td>
                        <td>{{$campaign->bin ?? ''}}</td>
                        <td>{{$campaign->address}}</td>
                        <td>{{$campaign->phone}}</td>
                        <td>{{$campaign->lead_point }} </td>
                        <td>{{$campaign->min_year}}</td>
                        <td>{{$campaign->pledged ? 'Да' : 'Нет'}}</td>
                        <td>{{$campaign->arrested ? 'Да' : 'Нет'}}</td>
                        <td>{{$campaign->crashed ? 'Аварийное' : 'На ходу'}}</td>
                        <td>{{$campaign->right_hand ? 'Оба' : 'Слева'}}</td>
                        <td>{{$campaign->in_kz ? 'Да' : 'Нет'}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.campaign.edit', $campaign->id ) }}" class="btn btn-warning">
                                    <i class="fa fa-user-edit text-white"></i></a>
                                <form method="post" action="{{ route('admin.campaign.destroy', $campaign->id) }}"
                                      onclick="return confirm('ВЫ действительно хотите удалить компанию и его данные ?')"
                                    >
                                    @csrf @method('delete')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash-alt text-white"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

