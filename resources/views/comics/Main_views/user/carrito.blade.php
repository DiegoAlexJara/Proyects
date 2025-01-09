@extends('comics.layouts.user.app-layout')
@section('title')
    CONTACTO
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/user/carrito.css') }}">
@endsection

@section('content')
    <style>
        body {
            background: #ff8c00;
        }
    </style>
    <h1 class="text-center mb-4">Carrito de Compras</h1>
    @livewire('comics.user.carrito')
@endsection
