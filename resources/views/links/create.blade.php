@extends('layouts.app')

@section('sitetitle', 'Link hinzufügen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Link hinzufügen</h1>
{{--                <form action="/link" method="post">--}}
                <form action="{{ route('link.index') }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        <div class="form-group">
                            <label for="link_name">Link-Name</label>
                            <input type="text" class="form-control {{ $errors->has('link_name') ? 'border-danger' : ''}}"
                                   id="link_name" name="link_name" value="{{ old('link_name') }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('link_name') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control {{ $errors->has('url') ? 'border-danger' : ''}}"
                                   id="url" name="url" value="{{ old('url') }}">
                            <small class="form-text text-danger">{!! $errors->first('url') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="reihenfolge">Reihenfolge</label>
                            <input type="number" class="form-control {{ $errors->has('reihenfolge') ? 'border-danger' : ''}}"
                                   id="reihenfolge" name="reihenfolge" value="{{ old('reihenfolge') }}">
                            <small class="form-text text-danger">{!! $errors->first('reihenfolge') !!}</small>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-plus-circle mr-2"></i> Hinzufügen
                        </button>
                        <a class="btn btn-primary mt-4 float-lg-right" href="{{ route('link.index') }}">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
