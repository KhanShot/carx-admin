@extends('layouts.app')
@section('title')
    Анкета
@endsection
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Анкеты</h1>
{{--        <a href="{{route('admin.campaign.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                class="fas fa-user-plus fa-sm text-white-50 mr-2"></i> Создать</a>--}}
    </div>

    @include('inc.alert')
    <div id="app">
        <form-component :user="{{ auth()->user() }}"></form-component>
    </div>
@endsection
