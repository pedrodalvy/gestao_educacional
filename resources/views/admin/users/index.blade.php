@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

        <div class="card">
            <h5 class="card-header">Cadastro de usuários</h5>
            <div class="card-body table-responsive">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>

                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">Nenhum usuário cadastrado</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                {{ $users->links() }}
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Novo usuário</a>
            </div>
        </div>
    </div>
@endsection