@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

        <div class="card">
            <h5 class="card-header">Cadastro de usuários</h5>
            <div class="card-body table-responsive">

                <h6 class="card-subtitle mb-3 text-muted">Clique sobre o cadastro para editar</h6>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr class='clickable-row' data-href="{{ route('admin.users.edit', $user->id) }}" style="cursor: pointer">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">Nenhum usuário cadastrado</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                {{ $users->links() }}
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon"><i data-feather="user-plus" width="1rem" height="1rem"></i></span>
                    <span class="text">Novo usuário</span>
                </a>

            </div>
        </div>
    </div>
@endsection