@extends('layouts.app')

@section('title', 'Tecnologie')

@section('content')
    <div class="container">
        <h1 class="my-3">Lista Tecnologie</h1>

        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary mb-3">Crea Nuova Tecnologia</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Etichetta</th>
                    <th scope="col">Colore</th>
                    <th scope="col">Badge</th>
                <th></th>
                
                 
                </tr>
            </thead>
            <tbody>
                @forelse ($technologies as $technology)
                    <tr>
                        <th scope="row">{{ $technology->id }}</th>
                        <td>{{ $technology->label }}</td>
                   
                        <td>{{ $technology->color }}</td>
                        <td>{!! $technology->getBadge() !!}</td>
                        <td>
                            <a href="{{ route('admin.technologies.show', $technology) }}" class="me-2"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.technologies.edit', $technology) }}" class="me-2"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <button type="button" class="modal-button " data-bs-toggle="modal"
                                data-bs-target="#delete-technology-{{ $technology->id }}">
                                <i class="fa-solid fa-trash" style="color: red;"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun risultato</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{ $technologies->links() }}
    </div>
@endsection

@section('modal')
    @foreach ($technologies as $technology)
        <div class="modal fade" id="delete-technology-{{ $technology->id }}" tabindex="-1"
            aria-labelledby="delete-technology-{{ $technology->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare Progetto {{ $technology->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Questa operazione è irreversibile. Procedere?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection