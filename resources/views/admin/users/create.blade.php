@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')


        <div class="card">
            <h5 class="card-header">Novo usuário</h5>
            <div class="card-body table-responsive">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo de usuário</label>
                        <select class="form-control" id="type" name="type">
                            <option>Selecione um tipo</option>
                            <option value="1">Administrador</option>
                            <option value="2">Professor</option>
                            <option value="3">Aluno</option>
                        </select>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="send_mail" value="true" name="send_mail">
                        <label class="custom-control-label" for="send_mail">Enviar e-mail de boas-vindas</label>
                    </div>

                        <button type="submit" class="btn btn-primary mb-2 btn-icon-split">
                            <span class="icon"><i data-feather="user-check" width="1rem" height="1rem"></i></span>
                            <span class="text">Inserir</span>
                        </button>

                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mb-2 btn-icon-split">
                            <span class="icon"><i data-feather="arrow-left" width="1rem" height="1rem"></i></span>
                            <span class="text">Voltar</span>
                        </a>

                </form>
            </div>
        </div>
    </div>
@endsection