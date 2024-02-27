@extends('layouts.app')
@section('title')
    Транзакции
@endsection
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Транзакции</h1>
{{--        <a href="{{route('admin.campaign.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                class="fas fa-user-plus fa-sm text-white-50 mr-2"></i> Создать</a>--}}
    </div>

    @include('inc.alert')
    <div class="card">
        <div class="card-body table-responsive">
            <table id="table" class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя компании</th>
                    <th scope="col">БИН</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Сумма</th>
                    <th scope="col">Кол-во анкет</th>
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
                        <td>{{ $campaign->balance_sum_sum }} </td>
                        <td>{{$campaign->min_year}}</td>
                        <td>{{$campaign->pledged ? 'Да' : 'Нет'}}</td>
                        <td>{{$campaign->arrested ? 'Да' : 'Нет'}}</td>
                        <td>{{$campaign->crashed ? 'Аварийное' : 'На ходу'}}</td>
                        <td>{{$campaign->right_hand ? 'Справа' : 'Слева'}}</td>
                        <td>{{$campaign->in_kz ? 'Да' : 'Нет'}}</td>
                        <td>
                            <a href="#" class="btn btn-warning">
                                <i class="fa fa-user-edit text-white"></i></a>
                            <button class="btn btn-info" data-toggle="modal" data-target="#addBalanceModal"
                                    data-recipient="{{$campaign->user->name ?? ''}}"
                                    data-id="{{$campaign->id}}">
                                <i class="fa fa-cash-register text-white"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addBalanceModal" tabindex="-1" role="dialog" aria-labelledby="addBalanceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBalanceModalLabel">Пополнить баланс</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.transaction.store')}}" id="balance_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Сумма:</label>
                            <input type="number" class="form-control bg-white" name="sum">
                        </div>
                        <input type="hidden" name="campaign_id" id="campaign_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" onclick="return document.getElementById('balance_form').submit()" class="btn btn-primary">Пополнить</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $('#addBalanceModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget)
            let recipient = button.data('recipient')
            let id = button.data('id')
            let modal = $(this)
            modal.find('#campaign_id').val(id)
            modal.find('.modal-title').text('Пополнить баланс для ' + recipient)
        })
    </script>
@endsection
