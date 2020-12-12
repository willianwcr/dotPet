@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="modal" id="registerAnimalModal">
        <div class="modal-dialog">
            <form action="{{ route('animalRegister') }}" method="POST">
                @csrf
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
                                    <input type="radio" class="form-check-input" name="gender" id="gender-option-1" value="0">
                                    <label class="check-icon" for="gender-option-1">
                                        <i class="fas fa-venus"></i>
                                    </label>
                                </div>
                                <div class="form-check form-check-icon">
                                    <input type="radio" class="form-check-input" name="gender" id="gender-option-2" value="1">
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
                                    <input type="radio" class="form-check-input" name="specie" id="specie-option-1" value="0">
                                    <label class="check-icon" for="specie-option-1">
                                        🐶
                                    </label>
                                </div>
                                <div class="form-check form-check-icon">
                                    <input type="radio" class="form-check-input" name="specie" id="specie-option-2" value="1">
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
                            <textarea class="form-textarea block" rows="5" name="short-bio"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer align-right">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row dashboard">
        <div class="col-4">
            <h2 class="title">Minhas adoções</h2>
            <div class="card full-height">
                <ul class="list">
                    @foreach ($myadoptions as $myadoption)
                        <li class="list-item">
                            <a href="{{ route('animalId', $myadoption->animal->animal_id) }}">
                                @if($myadoption->image_id)
                                    <img class="item-image" src="{{ $myadoption->image->url() }}">
                                @else
                                    <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                                @endif
                            </a>
                            <div class="item-detail">
                                <h3 class="item-title">@switch($myadoption->animal->specie_id)
                                    @case(0)
                                        🐶
                                        @break
                                    @case(1)
                                        🐱
                                        @break
                                    @default
                                        🐾
                                @endswitch {{ $myadoption->animal->name }}</h3>
                                <span class="item-info">{{ $myadoption->animal->breed }} | @switch($myadoption->animal->gender)
                                    @case(0)
                                        <i class="fas fa-venus"></i> Fêmea
                                        @break
                                    @case(1)
                                        <i class="fas fa-mars"></i> Macho
                                        @break
                                    @default
                                        Sem gênero definido
                                @endswitch</span>
                                @if($myadoption->animal->published)
                                    @switch($myadoption->status_id)
                                        @case(0)
                                            <span class="badge secondary">Aguardando aprovação</span>
                                            @break
                                        @case(1)
                                            <span class="badge success">Aprovado</span>
                                            @break
                                        @case(2)
                                            <span class="badge danger">Rejeitado</span>
                                            @break
                                        @default
                                            
                                    @endswitch
                                @else
                                    <span class="badge secondary">Cancelado</span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                    @if($myadoptions->count() == 0)
                        <i>Você não tem nenhum pedido de adoção</i>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-4">
            <h2 class="title">Meus animais</h2>
            <div class="card full-height">
                <button class="btn btn-block btn-primary action" data-modal-toggle="registerAnimalModal">Cadastrar animal</button>
                <ul class="list">
                    @foreach ($myanimals as $myanimal)
                        <li class="list-item">
                            <a href="{{ route('animalId', $myanimal->animal_id) }}">
                                @if($myanimal->image_id)
                                    <img class="item-image" src="{{ $myanimal->image->url() }}">
                                @else
                                    <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                                @endif
                            </a>
                            <div class="item-detail">
                                <h3 class="item-title">
                                    @switch($myanimal->specie_id)
                                        @case(0)
                                            🐶
                                            @break
                                        @case(1)
                                            🐱
                                            @break
                                        @default
                                            🐾
                                    @endswitch {{ $myanimal->name }}
                                </h3>
                                <span class="item-info">{{ $myanimal->breed }} | 
                                    @switch($myanimal->gender)
                                        @case(0)
                                            <i class="fas fa-venus"></i> Fêmea
                                            @break
                                        @case(1)
                                            <i class="fas fa-mars"></i> Macho
                                            @break
                                        @default
                                            Sem gênero definido
                                    @endswitch
                                </span>
                                <div class="item-analytics">
                                    <div class="data">
                                        <i class="fas fa-eye"></i>
                                        {{ $myanimal->views }}
                                    </div>
                                    <div class="data">
                                        <i class="fas fa-user-alt"></i>
                                        {{ $myanimal->adoptions->count() }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-4">
            <h2 class="title">Instituições</h2>
            <div class="card full-height">
                <button class="btn btn-block btn-large btn-primary action">Procurar instituição</button>
                <ul class="list">
                    @foreach ($institutions as $institution)    
                        <li class="list-item">
                            <a href="#">
                                <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                            </a>
                            <div class="item-detail">
                                <h3 class="item-title">{{ $institution->name }}</h3>
                                @isset($institution->cidade)
                                    <span class="item-info">{{ $institution->cidade }}/{{ $institution->estado }}</span>
                                @endisset
                                <div class="item-analytics">
                                    <div class="data">
                                        <i class="fas fa-paw"></i> 
                                        @if($institution->animals->count() > 1)
                                            {{ $institution->animals->count() }} animais
                                        @elseif($institution->animals->count() == 1)
                                            1 animal
                                        @else
                                            Nenhum animal
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection