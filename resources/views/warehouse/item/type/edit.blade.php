@extends('layouts.app')

@section('sitetitle', 'Artikel-Art bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Artikel-Art bearbeiten</h1>
                <form action="/itemType/{{ $itemType->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="art">Art</label>
                            <input type="text" class="form-control {{ $errors->has('art') ? 'border-danger' : ''}}"
                                   id="art" name="art" value="{{ old('art') ?? $itemType->art }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('art') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="priorität">Priorität</label>
                            <input type="text" class="form-control {{ $errors->has('priorität') ? 'border-danger' : ''}}"
                                   id="priorität" name="priorität" value="{{ $itemType->priorität ?? old('priorität') }}"
                                   placeholder="Priorität von 1 (sehr hoch) bis 9 (sehr tief)">
                            <small class="form-text text-danger">{!! $errors->first('priorität') !!}</small>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-edit"></i> Änderung speichern
                        </button>
                        <a class="btn btn-primary mt-4 float-lg-right" href="/itemType">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
