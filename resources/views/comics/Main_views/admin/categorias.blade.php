@extends('comics.layouts.admin.app-layout')
@section('title')
CATEGORIAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/admin/productos-index.css') }}">
@endsection
@section('content')
    <h2><strong>CATEGORIAS</strong></h2>
    @livewire('comics.admin.category')
@endsection
