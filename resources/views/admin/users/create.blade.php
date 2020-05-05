@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

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

            <button type="submit" class="btn btn-primary mb-2 btn-block">Inserir</button>
        </form>
    </div>
@endsection