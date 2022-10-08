@extends('layouts.master')

@section('contenu')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-0 mb-2">Edition d'un etudiant </h3>

        <div class="mt-2">
            <form style="width:65%;" method="post" action="{{ route('etudiant.update', ['etudiant' => $etudiant->id]) }}">

                @csrf
                <input type="hidden" name="_method" value="PUT">

                @if (session()->has('success'))
                    <div class="alert alert-success">

                        <h3>{{ session()->get('success') }}</h3>

                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de l'etudiant</label>
                    <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Classe</label>
                    <select class="form-control" name="classe_id" required>
                        <option value="">Liste des classes</option>

                        @foreach ($classes as $classe)
                            @if ($classe->id == $etudiant->classe_id)
                                <option value="{{ $classe->id }}" selected>{{ $classe->libelle }}</option>
                            @else
                                <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                            @endif
                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                        @endforeach

                    </select>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{ route('etudiant') }}" class="btn btn-danger">Annuler</a>
            </form>
        </div>
    @endsection
