@extends('layouts.index')

@section('body')
    <x-header/>
    <div class="content">
        @yield('content')
    </div>
    <x-footer/>
@endsection