@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Usuário - {{$user->name}}</h5>
            <div class="card-body table-responsive">

                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mb-4 btn-icon-split d-print-none">
                    <span class="icon"><i data-feather="list" width="1rem" height="1rem"></i></span>
                    <span class="text">Lista de usuários</span>
                </a>

                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th scope="row">#</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Password</th>
                        <td><span class="badge badge-secondary">{{ $user->password }}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection