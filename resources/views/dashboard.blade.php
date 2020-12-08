@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    Seja bem vindo(a), <h1>{{ Auth::user()->name }}</h1>
@endsection