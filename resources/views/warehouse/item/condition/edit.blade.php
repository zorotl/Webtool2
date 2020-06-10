@extends('layouts.app')

@section('sitetitle', 'Artikel-Zustand bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-primary">Lager</h1>
                <h2 class="h3 text-primary my-4">Artikel-Zustand bearbeiten</h2>
                <form action="/itemCondition/{{ $itemCondition->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="zustand">Zustand</label>
                        <input type="text" class="form-control {{ $errors->has('zustand') ? 'border-danger' : ''}}"
                               id="zustand" name="zustand" value="{{ $itemCondition->zustand ?? old('zustand') }}" autofocus>
                        <small class="form-text text-danger">{!! $errors->first('zustand') !!}</small>
                    </div>
                    <input class="btn btn-primary mt-4" type="submit" value="Änderung speichern">
                    <a class="btn btn-primary mt-4 float-lg-right" href="/itemCondition">
                        <i class="fas fa-arrow-circle-up mr-2"></i>
                        Zurück
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
