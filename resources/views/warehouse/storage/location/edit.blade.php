@extends('layouts.app')

@section('sitetitle', 'Lagerort bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lagerort: Lagerort bearbeiten</h1>
                <form action="/storage_location/{{ $storageLocation->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="lagerort">Lagerort</label>
                            <input type="text" class="form-control {{ $errors->has('lagerort') ? 'border-danger' : ''}}"
                                   id="lagerort" name="lagerort" value="{{ old('lagerort') ?? $storageLocation->lagerort }}" autofocus>
                            <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="lager">Lager</label>
                            <select name="lager" id="lager" class="form-control {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                                @foreach($warehouses as $w)
                                    <option value="{{ $w->id }}"
                                        @if($w->id === $storageLocation->warehouse_id)
                                            selected
                                        @endif
                                    >{{ $w->lager }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
                        </div>

                        <input class="btn btn-primary mt-4" type="submit" value="Änderung speichern">
                        <a class="btn btn-primary mt-4 float-lg-right" href="/storage_location">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
