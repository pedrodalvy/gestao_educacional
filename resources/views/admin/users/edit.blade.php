@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')
        <div class="card">
            <h5 class="card-header">Editar cadastro</h5>
            <div class="card-body table-responsive">

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="d-flex bd-highlight mb-3">
                        <button type="submit" class="btn btn-primary ">Salvar</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ml-2 mr-2">Voltar</a>

                        <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteModal">
                            Remover
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Remover Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Deseja realmente excluir este cadastro?
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" id="formDelete" hidden>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" form="formDelete">Excluir</button>
                </div>
            </div>
        </div>
    </div>

@endsection