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
    </style>    
    @livewire('comics.user.products', ['name' => $category, 'model' => \App\Models\Comics\Category::class], key($category))
@endsection
