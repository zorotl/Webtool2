@extends('layouts.app')

@section('sitetitle', 'Artikel-Zustand hinzufügen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-primary">Lager</h1>
                <h2 class="h3 text-primary my-4">Artikel-Zustand hinzufügen</h2>
                <form action="/itemCondition" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        <div class="form-group">
                            <label for="zustand">Zustand</label>
                            <input type="text" class="form-control {{ $errors->has('zustand') ? 'border-danger' : ''}}"
                                   id="zustand" name="zustand" value="{{ old('zustand') }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('zustand') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Hinzufügen">
                        <a class="btn btn-primary mt-4 float-lg-right" href="/itemCondition">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
