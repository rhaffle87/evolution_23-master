@extends('user/template/user-template')

@section('title', 'Form Baronas SD | Evolution 2023')

@section('container')
    @if ($notification = Session::get('message'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $notification }}</strong>
        </div>
    @endif

    <style>
        .wrong-para {
            font-family: "Montserrat", sans-serif;
            position: absolute;
            bottom: 15vmin;
            padding: 3vmin 12vmin 3vmin 3vmin;
            font-weight: 600;
            color: #092532;
        }
    </style>

@endsection
