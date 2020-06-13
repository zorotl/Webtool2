@extends('layouts.app')

@section('sitetitle', 'Lagerplätze')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Lagerplätze</h1>
                <ul class="list-group list-group-striped border">
                    @foreach($storagePlaces as $sP)
                        <li class="list-group-item">
                            <span>{{ $sP->lagerplatz }} (von {{ $sP->storageLocation->warehouse->lager }} - {{ $sP->storageLocation->lagerort }})</span>
                            <div class="float-right">
                                <a class="ml-2 btn btn-sm btn-outline-primary"
                                   href="/storage_place/{{ $sP->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                    Bearbeiten
                                </a>
                                <form style="display: inline;" action="/storage_place/{{ $sP->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Wirklich löschen?')" class="btn btn-outline-danger btn-sm ml-2" type="submit">
                                        <i class="far fa-trash-alt mr-1"></i> Löschen
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a class="btn btn-primary mt-4" href="/storage_place/create">
                    <i class="fas fa-plus-circle mr-2"></i> Neuen Lagerplatz hinzufügen
                </a>
            </div>
        </div>
    </div>
@endsection
