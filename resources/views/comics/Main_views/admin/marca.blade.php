@extends('comics.layouts.admin.app-layout')
@section('title')
    MARCAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/admin/marca-index.css') }}">
@endsection
@section('content')
    <h2>MARCAS</h2>
    @livewire('comics.admin.marcas')
@endsection
