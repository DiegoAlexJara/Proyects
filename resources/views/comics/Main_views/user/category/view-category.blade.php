@extends('comics.layouts.user.app-layout')
@section('title')
    CATEGORIAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/user/category-shop.css') }}">
@endsection
@section('content')
    @livewire('comics.user.category-show')
@endsection