@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')
        <div class="card">
            <h5 class="card-header">Editar perfil</h5>
            <div class="card-body table-responsive">

                <form action="{{ route('admin.users.settings.update') }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmação de senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
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

                </form>
            </div>
        </div>
    </div>


@endsection