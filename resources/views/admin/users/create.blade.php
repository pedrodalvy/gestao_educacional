@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')


        <div class="card">
            <h5 class="card-header">Novo de usuário</h5>
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