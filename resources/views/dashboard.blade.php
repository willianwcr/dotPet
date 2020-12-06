@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <x-top-menu/>
    Seja bem vindo(a), <h1>{{ Auth::user()->name }}</h1>
@endsection