@extends('layouts.app')

@section('sitetitle', 'Lager-Verwaltung - Lagerorte')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Lagerorte für <b>{{ $warehouse->lager }}</b></h1>
                <ul class="list-group list-group-striped border">
                    @foreach($storageLocations as $sL)
                        <li class="list-group-item">
                            <span>{{ $sL->lagerort }} (von {{ $sL->warehouse->lager }})</span>
                            <div class="float-right">
                                <a class="ml-2 btn btn-sm btn-outline-secondary"
                                   href="/storage_location/{{ $sL->id }}">
                                    <i class="fas fa-info mr-1"></i>
                                    Lagerplätze anzeigen
                                </a>
                                <form style="display: inline;" action="/storage_location/{{ $sL->id }}/edit" method="post">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" id="warehouse_id" name="warehouse_id" value="{{ $warehouse->id }}">
                                    <button class="ml-2 btn btn-sm btn-outline-primary" type="submit">
                                        <i class="fas fa-edit"></i>
                                        Bearbeiten
                                    </button>
                                </form>
                                <form style="display: inline;" action="/storage_location/{{ $sL->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input onclick="return confirm('Wirklich löschen?')"
                                           class="btn btn-outline-danger btn-sm ml-2" type="submit" value="Löschen">
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <form style="display: inline;" action="/storage_location/create" method="post">
                    @csrf
                    @method('GET')
                    <input type="hidden" id="warehouse_id" name="warehouse_id" value="{{ $warehouse->id }}">
                    <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-plus-circle mr-2"></i>Neuen Lagerort hinzufügen</button>
                </form>
                <a class="btn btn-primary mt-4 float-lg-right" href="/warehouse">
                    <i class="fas fa-arrow-circle-up mr-2"></i>
                    Zurück
                </a>
            </div>
        </div>
    </div>
@endsection
