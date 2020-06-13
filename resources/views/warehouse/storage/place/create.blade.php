@extends('layouts.app')

@section('sitetitle', 'Lagerplatz hinzufügen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Lagerplatz hinzufügen</h1>
                <form action="/storage_place" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        <div class="form-group">
                            <label for="lagerplatz">Lagerplatz</label>
                            <input type="text" class="form-control {{ $errors->has('lagerplatz') ? 'border-danger' : ''}}"
                                   id="lagerplatz" name="lagerplatz" value="{{ old('lagerplatz') }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('lagerplatz') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="lagerort">Lager - Lagerort</label>
                            <select name="lagerort" id="lagerort" class="form-control {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                                <option value="{{ $storageLocation->id }}">{{ $storageLocation->warehouse->lager }} - {{ $storageLocation->lagerort }}</option>
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-plus-circle mr-2"></i> Hinzufügen
                        </button>
                        <a class="btn btn-primary mt-4 float-lg-right" href="/storage_location/{{ $storageLocation->id }}">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
