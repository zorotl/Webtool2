@extends('layouts.app')

@section('sitetitle', 'Lager-Verwaltung - Lagerplätze')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Lagerplätze für
                    <b>{{ $storageLocation->warehouse->lager }} - {{ $storageLocation->lagerort }}</b>
                </h1>
                <ul class="list-group list-group-striped border">
                    @foreach($storagePlaces as $sP)
                        <li class="list-group-item">
                            <span>{{ $sP->lagerplatz }}</span>
                            <div class="float-right">
                                <form style="display: inline;" action="/storage_place/{{ $sP->id }}/edit" method="post">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" id="storage_location_id" name="storage_location_id" value="{{ $storageLocation->id }}">
                                    <button class="ml-2 btn btn-sm btn-outline-primary" type="submit">
                                        <i class="fas fa-edit"></i>
                                        Bearbeiten
                                    </button>
                                </form>
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
                <form style="display: inline;" action="/storage_place/create" method="post">
                    @csrf
                    @method('GET')
                    <input type="hidden" id="storage_location_id" name="storage_location_id" value="{{ $storageLocation->id }}">
                    <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-plus-circle mr-2"></i>Neuen Lagerplatz hinzufügen</button>
                </form>
                <a class="btn btn-primary mt-4 float-lg-right" href="/warehouse/{{ $storageLocation->warehouse->id }}">
                    <i class="fas fa-arrow-circle-up mr-2"></i>
                    Zurück
                </a>
            </div>
        </div>
    </div>
@endsection
