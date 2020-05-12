@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')
        <div class="card">
            <h5 class="card-header">Editar cadastro da disciplina <strong>{{ $subject->name }}</strong></h5>
            <div class="card-body table-responsive">

                <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $subject->name }}">
                    </div>

                    <div class="d-flex bd-highlight mb-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i data-feather="check-circle" width="1rem" height="1rem"></i></span>
                            <span class="text">Salvar</span>
                        </button>

                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary btn-icon-split ml-2 mr-2">
                            <span class="icon"><i data-feather="arrow-left-circle" width="1rem" height="1rem"></i></span>
                            <span class="text">Voltar</span>
                        </a>

                        <button type="button" class="btn btn-danger ml-auto btn-icon-split" data-toggle="modal"
                                data-target="#deleteModal">
                            <span class="icon"><i data-feather="trash-2" width="1rem" height="1rem"></i></span>
                            <span class="text">Remover</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
         aria-hidden="true">
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
                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" id="formDelete"
                          hidden>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                        <span class="icon"><i data-feather="x" width="1rem" height="1rem"></i></span>
                        <span class="text">Cancelar</span>
                    </button>
                    <button type="submit" class="btn btn-danger btn-icon-split" form="formDelete">
                        <span class="icon"><i data-feather="trash-2" width="1rem" height="1rem"></i></span>
                        <span class="text">Excluir</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection