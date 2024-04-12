@extends('layouts.app')

@section('title', 'Nuovo Progetto')

@section('content')
    <div class="container">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

        <h1 class="mb-3">Crea un nuovo progetto</h1>

        <form enctype="multipart/form-data" action="{{ route('admin.projects.store') }}" method="POST" >
            @csrf

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
<!-- CATEGORIA! -->
                <div class="col-6">
                    <label for="type_id" class="form-label">Categoria</label>
                    <select type="text" class="form-select @error('type_id') is-invalid @enderror" id="type_id"
                        name="type_id" value="{{ old('type_id')}}">
                        <option value="">Seleziona una categoria</option>
                        @foreach($types as $type)
                        <option {{ $type->id == old('type_id', $project->type_id) ? 'selected' : ''}} value="{{ $type->id }}">{{ $type->label }}</option>
                        @endforeach
                        </select>

                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
<!-- TECHNOLOGIES -->
                <div class="col">
                    <label for="technology_id" class="form-label">Tecnologie</label><br>
                                   
                        @foreach($technologies as $technology)
                        <input class="me-2 ms-3 form-check-input form-control @error('technologies') is-invalid @enderror" type="checkbox" value="{{ $technology->id }}" name="technologies[]"  {{ in_array($technology->id, old('technologies', $project_technologies_id ?? [])) ? 'checked' : '' }} >{!! $technology->getBadge() !!}</input>
                        @endforeach
                    

              
                </div>

    
                <!-- FILE UPLOAD -->
                    
                <div class="mb-3">
                <label for="image" class="form-label">Inserisci immagine</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                
                @error('image')
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