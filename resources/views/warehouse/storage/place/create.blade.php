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
                            <label for="lager">Lager</label>
                            <select name="lager" id="lager" class="form-control {{ $errors->has('lager') ? 'border-danger' : ''}}">
                                <option value="">Bitte wählen</option>
                            @foreach($warehouses as $w)
                                <option value="{{ $w->id }}">{{ $w->lager }}</option>
                            @endforeach
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="lagerort">Lagerort</label>
                            <select name="lagerort" id="lagerort" class="form-control {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                                <option value="">Bitte wählen</option>
                                @foreach($storageLocations as $sL)
                                    <option value="{{ $sL->id }}">{{ $sL->lagerort }} von {{ $sL->warehouse->lager }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
                        </div>

                        <input class="btn btn-primary mt-4" type="submit" value="Hinzufügen">
                        <a class="btn btn-primary mt-4 float-lg-right" href="/storage_place">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
