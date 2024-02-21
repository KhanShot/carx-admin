@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Анкеты</h1>
{{--        <a href="{{route('admin.campaign.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                class="fas fa-user-plus fa-sm text-white-50 mr-2"></i> Создать</a>--}}
    </div>
    <div id="app">
        <form-component></form-component>
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
