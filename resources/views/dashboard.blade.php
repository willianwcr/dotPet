@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row dashboard">
        <div class="col-4">
            <h2 class="title">Minhas adoções</h2>
            <div class="card">
                <ul class="list">
                    <span class="date">24 de Outubro</span>
                    <li class="list-item">
                        <a href="#">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">🐶 Pretinha</h3>
                            <span class="item-info">Vira-lata | ♀️ Fêmea</span>
                            <span class="badge">Aguardando aprovação</span>
                        </div>
                    </li>
                    <li class="list-item">
                        <a href="#">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">🐶 Pretinha</h3>
                            <span class="item-info">Vira-lata | ♀️ Fêmea</span>
                            <span class="badge danger">Aguardando aprovação</span>
                        </div>
                    </li>
                    <span class="date">24 de Outubro</span>
                    <li class="list-item">
                        <a href="#">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">🐶 Pretinha</h3>
                            <span class="item-info">Vira-lata | ♀️ Fêmea</span>
                            <span class="badge success">Aguardando aprovação</span>
                        </div>
                    </li>
                    <li class="list-item">
                        <a href="#">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">🐶 Pretinha</h3>
                            <span class="item-info">Vira-lata | ♀️ Fêmea</span>
                            <span class="badge">Aguardando aprovação</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <h2 class="title">Meus animais</h2>
            <div class="card">
                <button class="btn btn-block btn-primary action">Cadastrar animal</button>
                <ul class="list">
                    <li class="list-item">
                        <a href="#">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">🐶 Pretinha</h3>
                            <span class="item-info">Vira-lata | ♀️ Fêmea</span>
                            <div class="item-analytics">
                                <div class="data">
                                    <i class="fas fa-eye"></i>
                                    87
                                </div>
                                <div class="data">
                                    <i class="fas fa-user-alt"></i>
                                    5
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <h2 class="title">Instituições</h2>
            <div class="card">
                <button class="btn btn-block btn-large btn-primary action">Procurar instituição</button>
                <ul class="list">
                    <li class="list-item">
                        <a href="#">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">ONG Anjos de Rua Manaus</h3>
                            <span class="item-info">Manaus, Amazonas</span>
                            <div class="item-analytics">
                                <div class="data">
                                    <i class="fas fa-paw"></i>
                                    35 animais
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection