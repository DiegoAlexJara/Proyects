@extends('postify.layouts.app_layouts')
@section('title')
    INICIO
@endsection
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/postify/Inicio-user.css') }}">
@endsection
@section('content')
    @livewire('postify.my-posts')
@endsection
@section('js')
    <script src="{{ asset('js/create-post.js') }}"></script>
@endsection