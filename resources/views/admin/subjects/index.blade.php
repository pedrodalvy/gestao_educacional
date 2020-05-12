@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

        <div class="card">
            <h5 class="card-header">Cadastro de disciplinas</h5>
            <div class="card-body table-responsive">

                <h6 class="card-subtitle mb-3 text-muted">Clique sobre o cadastro para editar</h6>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="col-11">Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $subjects as $subject)
                        <tr class='clickable-row' data-href="{{ route('admin.subjects.edit', $subject->id) }}" style="cursor: pointer">
                            <th scope="row">{{ $subject->id }}</th>
                            <td>{{ $subject->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">Nenhum usuário cadastrado</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                {{ $subjects->links() }}
                <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon"><i data-feather="plus-circle" width="1rem" height="1rem"></i></span>
                    <span class="text">Nova disciplina</span>
                </a>

            </div>
        </div>
    </div>
@endsection