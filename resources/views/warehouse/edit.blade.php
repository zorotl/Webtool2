@extends('layouts.app')

@section('sitetitle', 'Lager bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Lager bearbeiten</h1>
                <form action="/warehouse/{{ $warehouse->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="lager">Lager</label>
                            <input type="text" class="form-control {{ $errors->has('lager') ? 'border-danger' : ''}}"
                                   id="lager" name="lager" value="{{ old('lager') ?? $warehouse->lager }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Änderung speichern">
                        <a class="btn btn-primary mt-4 float-lg-right" href="/warehouse">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
