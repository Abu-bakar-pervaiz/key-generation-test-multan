@extends('guest.layout.app')

@push('styles')
    @vite(['resources/js/app.js','resources/css/app.css'])
@endpush

@section('content')
    <div class="w-100" id="app">
        <key-check />
    </div>
@endsection
