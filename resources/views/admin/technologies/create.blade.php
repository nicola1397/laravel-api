@extends('layouts.app')

@section('title', 'Nuova Tecnologia')

@section('content')
    <div class="container">
        <a href="{{ route('admin.types.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

        <h1 class="mb-3">Crea una nuova tecnologia</h1>

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Etichetta</label>
                    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label"
                        name="label" value="{{ old('label') }}">
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