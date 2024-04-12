@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
    <div class="container">
        <h1 class="my-3">Lista Tipi</h1>

        <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">Crea Nuovo Tipo</a>

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
                @forelse ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->label }}</td>
                      
                        <td>{{ $type->color }}</td>
                        <td>{!! $type->getBadge() !!}</td>

                        <td>
                            <a href="{{ route('admin.types.show', $type) }}" class="me-2"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.types.edit', $type) }}" class="me-2"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <button type="button" class="modal-button" data-bs-toggle="modal"
                                data-bs-target="#delete-type-{{ $type->id }}">
                                <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
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

     
    </div>
@endsection

@section('modal')
    @foreach ($types as $type)
        <div class="modal fade" id="delete-type-{{ $type->id }}" tabindex="-1"
            aria-labelledby="delete-type-{{ $type->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare Progetto {{ $type->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Questa operazione è irreversibile. Procedere?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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