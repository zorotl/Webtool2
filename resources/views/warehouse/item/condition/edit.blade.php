@extends('layouts.app')

@section('sitetitle', 'Artikel-Zustand bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Artikel-Zustand bearbeiten</h1>
                <form action="/itemCondition/{{ $itemCondition->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="zustand">Zustand</label>
                            <input type="text" class="form-control {{ $errors->has('zustand') ? 'border-danger' : ''}}"
                                   id="zustand" name="zustand" value="{{ old('zustand') ?? $itemCondition->zustand }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('zustand') !!}</small>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-edit"></i> Änderung speichern
                        </button>
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
