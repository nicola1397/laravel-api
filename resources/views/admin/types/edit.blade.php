@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')
    <div class="container">
        <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary mt-4 mb-3">Torna al tipo</a>
        <a href="{{ route('admin.types.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

        <h1 class="mb-3">Modifica {{ $type->label }}</h1>

        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf

            @method('PATCH')

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Etichetta</label>
                    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label"
                        name="label" value="{{ $errors->any() ? old('label') : $type->label }}">

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