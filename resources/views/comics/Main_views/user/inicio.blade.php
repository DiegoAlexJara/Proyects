@extends('comics.layouts.user.app-layout')
@section('title')
    PRODUCTOS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/user/shop-producto.css') }}">
@endsection
@section('content')
    @livewire('comics.user.products')
@endsection