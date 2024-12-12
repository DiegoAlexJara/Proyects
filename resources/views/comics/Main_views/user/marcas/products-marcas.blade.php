@extends('comics.layouts.user.app-layout')
@section('title')
    CATEGORIA
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/user/shop-category.css') }}">
@endsection
@section('content')
    <style>
        body {
            background-color: {{ $color }};
        }

        .background-image {
            background-image: url("{{ asset($path) }}");
            margin: 20px;
            padding: 20px;
            background-size: cover;
            background-position: center;
        }
    </style>
    <div class="background-image">
        @livewire('comics.user.products', ['name' => $category, 'model' => \App\Models\Comics\Marca::class], key($category))
    </div>
@endsection
