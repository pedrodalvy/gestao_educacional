@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')
        <div class="card">
            <h5 class="card-header">Perfil do usuário <strong>{{ $user->name }}</strong></h5>
            <div class="card-body table-responsive">

                <form action="{{ route('admin.users.profile.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->profile->address }}">
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ $user->profile->cep }}">
                    </div>

                    <div class="form-group">
                        <label for="number">Número</label>
                        <input type="number" class="form-control" id="number" name="number" value="{{ $user->profile->number }}">
                    </div>

                    <div class="form-group">
                        <label for="complement">Complemento</label>
                        <input type="text" class="form-control" id="complement" name="complement" value="{{ $user->profile->complement }}">
                    </div>

                    <div class="form-group">
                        <label for="neighborhood">Bairro</label>
                        <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{ $user->profile->neighborhood }}">
                    </div>

                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $user->profile->city }}">
                    </div>

                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ $user->profile->state }}">
                    </div>

                    <div class="d-flex bd-highlight mb-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i data-feather="user-check" width="1rem" height="1rem"></i></span>
                            <span class="text">Salvar</span>
                        </button>

                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-icon-split ml-2 mr-2">
                            <span class="icon"><i data-feather="arrow-left" width="1rem" height="1rem"></i></span>
                            <span class="text">Voltar</span>
                        </a>

                    </div>

            </div>
        </div>
    </div>

@endsection