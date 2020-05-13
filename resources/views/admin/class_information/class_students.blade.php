@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

        <div class="card">
            <h5 class="card-header">Administração de alunos na turma</h5>
            <div class="card-body table-responsive">
            <class-student class-information="{{ $classinformation->id }}"></class-student>

            </div>
        </div>
    </div>
@endsection