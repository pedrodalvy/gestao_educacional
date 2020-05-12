@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

        <div class="card">
            <h5 class="card-header">Cadastro de turmas</h5>
            <div class="card-body table-responsive">

                <h6 class="card-subtitle mb-3 text-muted">Clique sobre o cadastro para editar</h6>
                <table class="table table-hover text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Data Inicio</th>
                        <th>Data Fim</th>
                        <th>Ciclo</th>
                        <th>Turma</th>
                        <th>Semestre</th>
                        <th>Ano</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $classInformations as $classInformation)
                        <tr class='clickable-row' data-href="{{ route('admin.classinformation.edit', $classInformation->id) }}" style="cursor: pointer">
                            <td>{{ $classInformation->id }}</td>
                            <td>{{ $classInformation->date_start->format('d/m/Y') }}</td>
                            <td>{{ $classInformation->date_end->format('d/m/Y') }}</td>
                            <td>{{ $classInformation->cycle }}</td>
                            <td>{{ $classInformation->subdivision }}</td>
                            <td>{{ $classInformation->semester }}</td>
                            <td>{{ $classInformation->year }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">Nenhuma turma cadastrada</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                {{ $classInformations->links() }}
                <a href="{{ route('admin.classinformation.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon"><i data-feather="plus-circle" width="1rem" height="1rem"></i></span>
                    <span class="text">Nova turma</span>
                </a>

            </div>
        </div>
    </div>
@endsection