@extends('comics.layouts.user.app-layout')
@section('title')
    CATEGORIAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/user/marcas-shop.css') }}">
@endsection
@section('content')
    @livewire('comics.user.marca-show')
@endsection