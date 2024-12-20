@extends('comics.layouts.admin.app-layout')
@section('title')
SUB-CATEGORIAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/admin/productos-index.css') }}">
@endsection
@section('content')
    <h2><strong>SUB-CATEGORIAS</strong></h2>
    @livewire('comics.admin.sub-category')
@endsection
