@extends('layouts.app')

@section('sitetitle', 'Marke bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Marke bearbeiten</h1>
                <form action="/brand/{{ $brand->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="marke">Marke</label>
                            <input type="text" class="form-control {{ $errors->has('marke') ? 'border-danger' : ''}}"
                                   id="marke" name="marke" value="{{ old('marke') ?? $brand->marke}}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('marke') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Änderung speichern">
                        <a class="btn btn-primary mt-4 float-lg-right" href="/brand">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
