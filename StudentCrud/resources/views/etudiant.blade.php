@extends('layouts.master')

@section('contenu')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-0 mb-2">Liste des etudiants inscrits</h3>
        <div class="mt-2">
            <div class="d-flex justify-content-between mb-2">
                {{ $etudiants->links() }}
                <div>
                    <a class="btn btn-primary" href="{{ route('etudiant.create') }}">Ajouter un nouvel etudiant </a>
                </div>
            </div>
            <div>

                @if (session()->has('successDelete'))
                    <div class="alert alert-success">

                        <h3>{{ session()->get('successDelete') }}</h3>

                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->classe->libelle }}</td>
                                <td>
                                    <a class="btn btn-success"
                                        href="{{ route('etudiant.editer', ['etudiant', $etudiant->id]) }}">Editer</a>
                                    <a class="btn btn-danger" href=""
                                        onclick="if (confirm('Voulez vous vraiment supprimer cet etudiant ?')) {
                                                document.getElementById('form-{{ $etudiant->id }}').submit();
                                            }">Supprimer</a>
                                    <form id="form-{{ $etudiant->id }}"
                                        action="{{ route('etudiant.supprimer', ['etudiant' => $etudiant->id]) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>



                </table>
            </div>

        </div>
    @endsection
