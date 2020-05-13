@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')
        <div class="card">
            <div class="card-header">
                <div class="row">

                    <h5 class="pt-2 pl-2">Editar cadastro da turma <strong>{{ $classInformation->cycle . ' ' . $classInformation->subdivision}}</strong></h5>

                    <a type="button" class="btn btn-info ml-auto btn-icon-split text-white"
                       href="{{ route('admin.classinformation.students.index', $classInformation->id) }}">

                        <span class="icon"><i data-feather="users" width="1rem" height="1rem"></i></span>
                        <span class="text">Alunos</span>
                    </a>
                </div>
            </div>

            <div class="card-body table-responsive">

                <form action="{{ route('admin.classinformation.update', $classInformation->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    @include('partials.class_information._class-information_form')

                    <div class="d-flex bd-highlight mb-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i data-feather="check-circle" width="1rem" height="1rem"></i></span>
                            <span class="text">Salvar</span>
                        </button>

                        <a href="{{ route('admin.classinformation.index') }}" class="btn btn-secondary btn-icon-split ml-2 mr-2">
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
                    <form action="{{ route('admin.classinformation.destroy', $classInformation->id) }}" method="POST" id="formDelete"
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