@extends('finanzas.layouts.app_layout')
@section('title', 'Inicio')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/finanzas/reports.css') }}">
@endsection
@section('content')
    <div style="display: flex; justify-content: center; align-items: center; margin-top: 100px">
        <main style="box-shadow: -15px 15px 1px rgba(255, 255, 255, 0.48); width: 80%; max-width: 1200px; padding: 20px;">
            @livewire('finanza.reports')
        </main>
    </div>

@endsection
