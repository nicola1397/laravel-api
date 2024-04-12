@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
    <div class="container">
        <h1 class="my-3">Lista Progetti</h1>

        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Crea Nuovo Progetto</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Estratto</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{!! $project->type->getBadge() !!}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->getAbstract(50) }}</td>

                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="me-2"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="me-2"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <!-- <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#delete-project-{{ $project->id }}">
                                <i class="fa-solid fa-trash" style="color: red;"></i>
                            </button> -->
                            <button type="button" class="modal-button" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $project->id }}">
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

       
    </div>
@endsection


@section('modal')
    @foreach ($projects as $project)
        <div class="modal fade" id="delete-{{ $project->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare Progetto {{ $project->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Premendo elimina l'azione sarà irreversibile. Procedere?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
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