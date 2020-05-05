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

                    <button type="submit" class="btn btn-primary mb-2">Salvar</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mb-2">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection