@extends('layouts.app')

@section('sitetitle', 'Artikel hinzufügen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Artikel hinzufügen</h1>
                <form action="/item" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2" for="lager">Lager</label>
                            <select name="lager" id="lager" class="form-control col-md-10 {{ $errors->has('lager') ? 'border-danger' : ''}}">
                                <option value="0">Bitte wählen</option>
                                @foreach($warehouses as $w)
                                    <option value="{{ $w->id }}">{{ $w->lager }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
                        </div>
                        <div id="lagerortGruppe" class="form-group row" style="display: none">
                            <label class="col-md-2" for="lagerort">Lagerort</label>
                            <select name="lagerort" id="lagerort" class="form-control col-md-10 {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                                // Wird via AJAX gefüllt
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
                        </div>
                        <div id="lagerplatzGruppe" class="form-group row" style="display: none">
                            <label class="col-md-2" for="lagerplatz">Lagerplatz</label>
                            <select name="lagerplatz" id="lagerplatz" class="form-control col-md-10 {{ $errors->has('lagerplatz') ? 'border-danger' : ''}}">
                                // Wird via AJAX gefüllt
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lagerplatz') !!}</small>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-plus-circle mr-2"></i> Hinzufügen
                        </button>
                        <a class="btn btn-primary mt-4 float-lg-right" href="/item">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
