@extends('comics.layouts.admin.app-layout')
@section('title')
    PRODUCTOS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/admin/productos-index.css') }}">
@endsection
@section('content')
    <h2>PRODUCTOS</h2>
    @livewire('comics.admin.products')
@endsection
