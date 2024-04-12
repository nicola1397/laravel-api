@extends('layouts.app')

@section('title', 'Modifica Tecnologia')

@section('content')
    <div class="container">
        <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-primary mt-4 mb-3">Torna al progetto</a>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

        <h1 class="mb-3">Modifica {{ $technology->label }}</h1>

        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
            @csrf

            @method('PATCH')

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Etichetta</label>
                    <input technology="text" class="form-control @error('label') is-invalid @enderror" id="label"
                        name="label" value="{{ $errors->any() ? old('label') : $technology->label }}">

                    @error('label')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-2">
                    <button class="btn btn-success">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection