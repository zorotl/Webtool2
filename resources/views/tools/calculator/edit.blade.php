@extends('layouts.app')

@section('sitetitle', 'Preis-Rechner Konfiguration')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Tools: Preis-Rechner Konfiguration</h1>
                <form action="/calculator/{{ $calculator->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="mwst">MwSt.</label>
                            <input type="text" class="form-control {{ $errors->has('mwst') ? 'border-danger' : ''}}"
                                   id="mwst" name="mwst" value="{{ old('mwst') ?? $calculator->mwst}}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('mwst') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="eurochf">Euro-CHF Kurs</label>
                            <input type="text" class="form-control {{ $errors->has('eurochf') ? 'border-danger' : ''}}"
                                   id="eurochf" name="eurochf" value="{{ old('eurochf') ?? $calculator->eurochf}}">
                            <small class="form-text text-danger">{!! $errors->first('eurochf') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="atfaktor">AT-Faktor</label>
                            <input type="text" class="form-control {{ $errors->has('atfaktor') ? 'border-danger' : ''}}"
                                   id="atfaktor" name="atfaktor" value="{{ old('atfaktor') ?? $calculator->atfaktor}}">
                            <small class="form-text text-danger">{!! $errors->first('atfaktor') !!}</small>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-edit"></i> Änderung speichern
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
