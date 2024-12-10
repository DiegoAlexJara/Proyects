@extends('postify.layouts.app_layouts')
@section('title')
    {{ $name }}
@endsection
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/postify/Inicio-user.css') }}">
@endsection
@section('content')
    {{-- @livewire('MyPosts', ['userId' => Auth::user()->id], key(Auth::user()->name)) --}}
    @livewire('postify.my-posts', ['userId' => $userId], key($userId));
@endsection
