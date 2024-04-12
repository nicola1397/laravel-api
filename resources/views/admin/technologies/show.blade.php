@extends('layouts.app')

@section('title')
    {{ $technology->label }}
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>
        <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-primary mt-4 mb-3">Modifica</a>
        <button technology="button" class="btn btn-danger mt-4 mb-3" data-bs-toggle="modal"
            data-bs-target="#delete-technology-{{ $technology->id }}">
            Elimina
        </button>

        <h1 class="mt-3 fw-bold">{{ $technology->label }}</h1>

    
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="delete-technology-{{ $technology->id }}" tabindex="-1"
        aria-labelledby="delete-technology-{{ $technology->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare Progetto {{ $technology->title }}</h1>
                    <button technology="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Premendo elimina l'azione sarà irreversibile. Procedere?
                </div>
                <div class="modal-footer">
                    <button technology="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button technology="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection