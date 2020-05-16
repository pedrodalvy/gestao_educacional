@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials._alert')

        <div class="card">
            <h5 class="card-header">Administração de disciplina e professor</h5>
            <div class="card-body table-responsive">
                <class-teaching class-information="{{ $classinformation->id }}"></class-teaching>

            </div>
        </div>
    </div>
@endsection