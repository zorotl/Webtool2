@extends('layouts.app')

@section('sitetitle', 'Artikel-Art bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-primary">Lager</h1>
                <h2 class="h3 text-primary my-4">Artikel-Art bearbeiten</h2>
                <form action="/itemType/{{ $itemType->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="art">Art</label>
                            <input type="text" class="form-control {{ $errors->has('art') ? 'border-danger' : ''}}"
                                   id="art" name="art" value="{{ $itemType->art ?? old('art') }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('art') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="priorität">Priorität</label>
                            <input type="text" class="form-control {{ $errors->has('priorität') ? 'border-danger' : ''}}"
                                   id="priorität" name="priorität" value="{{ $itemType->priorität ?? old('priorität') }}"
                                   placeholder="Priorität von 1 (sehr hoch) bis 9 (sehr tief)">
                            <small class="form-text text-danger">{!! $errors->first('priorität') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Änderung speichern">
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
