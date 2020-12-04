@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
Dashboard
<a href="{{ route('logout') }}">Logout</a>
@endsection