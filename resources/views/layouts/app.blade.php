@extends('layouts.index')

@section('body')
    <x-top-menu/>
    <div class="content">
        @yield('content')
    </div>
@endsection