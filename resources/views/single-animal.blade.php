@extends('layouts.app')

@section('title', 'Animal')

@section('content')
    @if($isowner)
        <div class="modal" id="editAnimalModal">
            <div class="modal-dialog">
                <form action="{{ route('animal.update', $animal->animal_id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <span class="modal-title">Editar informações</span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8">
                                <label class="input-label">Nome</label>
                                <input type="text" class="form-input block" name="name" placeholder="Ex: Toby" value="{{ $animal->name }}" required>
                            </div>
                            <div class="col-4">
                                <label class="input-label">Sexo</label>
                                <div class="form-justify">
                                    <div class="form-check form-check-icon">
                                        <input type="radio" class="form-check-input" name="gender" id="gender-option-1" value="0" @if ($animal->gender == 0)
                                            checked
                                        @endif>
                                        <label class="check-icon" for="gender-option-1">
                                            <i class="fas fa-venus"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-icon">
                                        <input type="radio" class="form-check-input" name="gender" id="gender-option-2" value="1" @if ($animal->gender == 1)
                                            checked
                                        @endif>
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
                                        <input type="radio" class="form-check-input" name="specie" id="specie-option-1" value="0" @if ($animal->specie_id == 0)
                                            checked
                                        @endif>
                                        <label class="check-icon" for="specie-option-1">
                                            🐶
                                        </label>
                                    </div>
                                    <div class="form-check form-check-icon">
                                        <input type="radio" class="form-check-input" name="specie" id="specie-option-2" value="1" @if ($animal->specie_id == 1)
                                        checked
                                    @endif>
                                        <label class="check-icon" for="specie-option-2">
                                            🐱
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="input-label">Raça</label>
                                <input type="text" class="form-input block" name="breed" placeholder="Ex: Vira-lata" value="{{ $animal->breed }}" required>
                            </div>
                            <div class="col-4">
                                <label class="input-label">Data de nascimento</label>
                                <input type="date" class="form-input block" name="birthday" placeholder="dd/mm/aaaa" value="{{ $animal->birthday }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="input-label">Biografia curta</label>
                                <textarea class="form-textarea block" rows="5" name="short-bio">{{ $animal->short_bio }}</textarea>
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
        <div class="modal" id="editAnimalBioModal">
            <div class="modal-dialog">
                <form action="{{ route('animal.update.bio', $animal->animal_id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <span class="modal-title">Editar biografia</span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="input-label">Biografia</label>
                                <textarea class="form-textarea block" rows="10" name="bio">{{ $animal->bio }}</textarea>
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
        <div class="modal" id="viewAdoptionsModal">
            <div class="modal-dialog">
                <div class="modal-header">
                    <span class="modal-title">Adoções</span>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <ul class="list">
                                @foreach ($adoptions as $adoption)
                                    <li class="list-item">
                                        <a href="#">
                                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                                        </a>
                                        <div class="item-detail">
                                            <h3 class="item-title">{{ $adoption->user->name }}</h3>
                                            <span class="item-info">{{ $adoption->user->age }} anos
                                                @isset($adoption->user->cidade)
                                                    | {{ $adoption->user->cidade }}/{{ $adoption->user->estado }}
                                                @endisset
                                            </span>
                                        </div>
                                        <div class="item-actions">
                                            <button class="btn btn-sm btn-success btn-outline" onclick="window.location.href = '{{ route('animal.adopt.approve', $adoption->adoption_id) }}'"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-sm btn-danger btn-outline" onclick="window.location.href = '{{ route('animal.adopt.disapprove', $adoption->adoption_id) }}'"><i class="fas fa-times"></i></button>
                                        </div>
                                    </li>
                                @endforeach
                                @if($adoptions->count() == 0)
                                    <i>Você não tem nenhum pedido de adoção</i>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer align-center">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
        <div class="modal" id="addProfilePictureModal">
            <div class="modal-dialog">
                <form action="{{ route('animal.update.photo', $animal->animal_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <span class="modal-title">Adicionar foto de perfil</span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="file" name="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer align-center">
                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <div class="row animal">
        <div class="col-4">
            <h2 class="title">Informações 
                @if($isowner)
                    <span class="badge secondary" data-modal-toggle="editAnimalModal"><i class="fas fa-pen"></i></span>
                    <span class="badge secondary" data-modal-toggle="addProfilePictureModal"><i class="far fa-image"></i> Adicionar foto</span>
                @endif
            </h2>
            <div class="card align-center">
                <div class="cover" style="background-color: #EF476F;">
                </div>
                <div class="profile-picture">
                    @if($animal->image_id)
                        <img src="{{ $animal->image->url() }}">
                    @else
                        <img src="{{ asset('./img/no-photo.png') }}">
                    @endif
                    
                </div>
                <div class="detail">
                    <h1 class="title">
                        @switch($animal->specie_id)
                            @case(0)
                                🐶
                                @break
                            @case(1)
                                🐱
                                @break
                            @default
                                🐾
                        @endswitch
                         {{ $animal->name }} 
                        @if($isowner)
                            @if($animal->published)
                                <span class="badge success">Publicado</span>
                            @else
                                <span class="badge secondary">Em rascunho</span>
                            @endif
                        @else
                            @if(!$myadoption)
                                <span class="badge secondary">Disponível</span>
                            @else
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
                                        <span class="badge secondary">Disponível</span>
                                @endswitch
                            @endif
                        @endif
                    </h1>
                    <span class="info">{{ $animal->breed }} | {{ $animal->age }} anos |
                        @switch($animal->gender)
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
                </div>
                <div class="short-bio">
                    {{ $animal->short_bio }}
                </div>
                @if($isowner)
                    @if($animal->published)
                        <button class="btn btn-block btn-large btn-secondary gray action" onclick="window.location.href = '{{ route('animal.unpublish', $animal->animal_id) }}'">Cancelar publicação</button>
                    @else
                        <button class="btn btn-block btn-large btn-secondary gray action" onclick="window.location.href = '{{ route('animal.delete', $animal->animal_id) }}'"><i class="fas fa-trash"></i> Deletar</button>
                        <button class="btn btn-block btn-large btn-primary action" onclick="window.location.href = '{{ route('animal.publish', $animal->animal_id) }}'"><i class="fas fa-upload"></i> Publicar</button>
                    @endif
                @else
                    <button class="btn btn-block btn-large btn-secondary action">Compartilhar</button>
                    @if($myadoption)
                        <button class="btn btn-block btn-large btn-secondary gray action" onclick="window.location.href = '{{ route('animal.adopt.cancel', $animal->animal_id) }}'">Cancelar adoção</button>
                    @else
                        <button class="btn btn-block btn-large btn-primary action" onclick="window.location.href = '{{ route('animal.adopt', $animal->animal_id) }}'">Adotar</button>
                    @endif
                @endif
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-7">
                    <h2 class="title">Biografia 
                        @if($isowner)
                            <span class="badge secondary" data-modal-toggle="editAnimalBioModal"><i class="fas fa-pen"></i></span>
                        @endif
                    </h2>
                    <div class="card">
                        <p class="biografia">
                            @empty($animal->bio)
                                <i>Nenhuma biografia cadastrada...</i>
                            @endempty
                            @isset($animal->bio)
                                {{ $animal->bio }}
                            @endisset
                        </p>
                    </div>
                </div>
                <div class="col-5">
                    @if($isowner && !isset($adopted_by))
                        <h2 class="title">Estatísticas</h2>
                        <div class="card">
                            <div class="analytics">
                                <div class="details">
                                    
                                </div>
                                <button class="btn btn-block btn-large btn-primary action" data-modal-toggle="viewAdoptionsModal">Ver adoções</button>
                            </div>
                        </div>
                    @else
                        @isset($adopted_by)
                            <h2 class="title">Adotado por</h2>
                            <div class="card">
                                <div class="owner">
                                    <div class="image">
                                        <img src="{{ asset('./img/no-photo.png') }}">
                                    </div>
                                    <div class="details">
                                        <span class="name">{{ $adopted_by->name }}</span>
                                        <span class="info">{{ $adopted_by->age }} anos
                                            @isset($adopted_by->cidade)
                                                | {{ $adopted_by->cidade }}/{{ $adopted_by->estado }}
                                            @endisset
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @empty($adopted_by)
                            @if($owner->type == 0)
                                <h2 class="title">Doador</h2>
                                <div class="card">
                                    <div class="owner">
                                        <div class="image">
                                            <img src="{{ asset('./img/no-photo.png') }}">
                                        </div>
                                        <div class="details">
                                            <span class="name">{{ $owner->name }}</span>
                                            <span class="info">{{ $owner->age }} anos
                                                @isset($owner->cidade)
                                                    | {{ $owner->cidade }}/{{ $owner->estado }}
                                                @endisset
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @elseif($owner->type == 1)
                                <h2 class="title">Instituição</h2>
                                <div class="card">
                                    <div class="owner">
                                        <div class="image">
                                            <img src="{{ asset('./img/no-photo.png') }}">
                                        </div>
                                        <div class="details">
                                            <span class="name">{{ $owner->name }}</span>
                                            <span class="info"><i class="fas fa-paw"></i> @if($owner->animals->count() > 1)
                                                {{ $owner->animals->count() }} animais
                                                @elseif($owner->animals->count() == 1)
                                                    1 animal
                                                @else
                                                    Nenhum animal
                                                @endif
                                                @isset($owner->cidade)
                                                    | {{ $owner->cidade }}/{{ $owner->estado }}
                                                @endisset
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endempty
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Galeria
                        @if($isowner)
                            <span class="badge secondary"><i class="fas fa-pen"></i></span>
                        @endif
                    </h2>
                    <div class="card">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection