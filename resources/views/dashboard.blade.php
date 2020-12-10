@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <span class="modal-title">Cadastrar animal</span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <label class="input-label">Nome</label>
                        <input type="text" class="form-input block" name="name" placeholder="Ex: Toby" required>
                    </div>
                    <div class="col-4">
                        <label class="input-label">Sexo</label>
                        <div class="form-justify">
                            <div class="form-check form-check-icon">
                                <input type="radio" class="form-check-input" name="gender" id="gender-option-1">
                                <label class="check-icon" for="gender-option-1">
                                    <i class="fas fa-venus"></i>
                                </label>
                            </div>
                            <div class="form-check form-check-icon">
                                <input type="radio" class="form-check-input" name="gender" id="gender-option-2">
                                <label class="check-icon" for="gender-option-2">
                                    <i class="fas fa-mars"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="input-label">Espécie</label>
                        <div class="form-justify">
                            <div class="form-check form-check-icon">
                                <input type="radio" class="form-check-input" name="specie" id="specie-option-1">
                                <label class="check-icon" for="specie-option-1">
                                    🐶
                                </label>
                            </div>
                            <div class="form-check form-check-icon">
                                <input type="radio" class="form-check-input" name="specie" id="specie-option-2">
                                <label class="check-icon" for="specie-option-2">
                                    🐱
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="input-label">Raça</label>
                        <input type="text" class="form-input block" name="breed" placeholder="Ex: Vira-lata" required>
                    </div>
                    <div class="col-4">
                        <label class="input-label">Data de nascimento</label>
                        <input type="text" class="form-input block" name="birthday" placeholder="dd/mm/aaaa" onfocus="(this.type='date')" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="input-label">Biografia curta</label>
                        <textarea class="form-textarea block" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer align-right">
                <button class="btn btn-sm btn-secondary">Cancelar</button>
                <button class="btn btn-sm btn-primary">Salvar</button>
            </div>
        </div>
    </div>
    <div class="row dashboard">
        <div class="col-4">
            <h2 class="title">Minhas adoções</h2>
            <div class="card full-height">
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
            <div class="card full-height">
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
            <div class="card full-height">
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