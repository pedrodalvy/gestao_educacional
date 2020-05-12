@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')


        <div class="card">
            <h5 class="card-header">Nova turma</h5>
            <div class="card-body table-responsive">

                <form action="{{ route('admin.classinformation.store') }}" method="POST">
                    @csrf

                    @include('partials.class_information._class-information_form')

                    <button type="submit" class="btn btn-primary mb-2 btn-icon-split">
                        <span class="icon"><i data-feather="check-circle" width="1rem" height="1rem"></i></span>
                        <span class="text">Inserir</span>
                    </button>

                    <a href="{{ route('admin.classinformation.index') }}" class="btn btn-secondary mb-2 btn-icon-split">
                        <span class="icon"><i data-feather="arrow-left-circle" width="1rem" height="1rem"></i></span>
                        <span class="text">Voltar</span>
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection