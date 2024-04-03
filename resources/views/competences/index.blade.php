@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Liste des compétences</h1>
        <div class="col-md-4">
            
            <!-- Formulaire d'ajout -->
            <form action="{{ route('competences.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Entrer la compétence:</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
        <div class="col-md-8">
                <!-- Liste des compétences -->
            <ul class="list-group mt-3">
                @foreach($competences as $competence)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $competence->id }} - {{ $competence->nom }} - {{ $competence->description }}
                    </div>
                    <div class="d-flex">
                        <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" class="d-inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        <a href="{{ route('competences.edit', $competence->id) }}" class="btn btn-primary btn-sm ">Modifier</a>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
