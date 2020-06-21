@extends('layouts.app')

@section('sitetitle', 'Artikel bearbeiten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Artikel bearbeiten</h1>
                <form action="/item/{{ $item->id }}" method="post">
                    <fieldset class="border border-secondary rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <small class="form-text text-muted col-md-10 offset-2">Um Lager-Daten zu ändern, dieses Dropdown zuerst auf "Bitte wählen" ändern<br>
                                und danach die 3 Dropdowns (Lager, Lagerort, Lagerplatz) neu ausfüllen.</small>
                            <label class="col-md-2" for="lager">Lager</label>
                            <select name="lager" id="lager"
                                    class="form-control form-control-sm col-md-10 {{ $errors->has('lager') ? 'border-danger' : ''}}">
                                <option value="0">Bitte wählen</option>
                                @foreach($warehouses as $w)
                                    @if($item->storage_place_id !== null)
                                        @php
                                            $storagePlace = $storagePlaces->firstWhere('id', $item->storage_place_id);
                                            $storagePlaceName = isset($storagePlace['lagerplatz']) ? $storagePlace['lagerplatz'] : "";
                                        @endphp
                                    @endif
                                    <option
                                        value="{{ $w->id }}"
                                        {{ (old("lager") == $w->id || $storagePlace->storageLocation->warehouse->id == $w->id ? "selected":"") }}>
                                        {{ $w->lager }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
                        </div>
                        <div id="lagerortGruppe" class="form-group row">
                            <label class="col-md-2" for="lagerort">Lagerort</label>
                            <select name="lagerort" id="lagerort"
                                    class="form-control form-control-sm col-md-10 {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                                <option value="0" disabled="disabled">Bitte wählen</option>
                                {{-- Wird via AJAX gefüllt, ausser wenn old() vorhanden, dann vorbelegen --}}
                                @if(old('lagerort') !== null)
                                    @php
                                        $storageLocation = $storageLocations->firstWhere('id', old('lagerort'));
                                        $storageLocationName = isset($storageLocation['lagerort']) ? $storageLocation['lagerort'] : "";
                                    @endphp
                                    <option value="{{ old('lagerort') }}" selected>{{ $storageLocationName }}</option>
                                @endif
                                @if($item->storage_place_id !== null)
                                    @php
                                        $storagePlace = $storagePlaces->firstWhere('id', $item->storage_place_id);
                                        $storagePlaceName = isset($storagePlace['lagerplatz']) ? $storagePlace['lagerplatz'] : "";
                                    @endphp
                                    <option value="{{ $storagePlace->storageLocation->id }}" selected>{{ $storagePlace->storageLocation->lagerort }}</option>
                                @endif
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
                        </div>
                        <div id="lagerplatzGruppe" class="form-group row">
                            <label class="col-md-2" for="lagerplatz">Lagerplatz</label>
                            <select name="lagerplatz" id="lagerplatz"
                                    class="form-control form-control-sm col-md-10 {{ $errors->has('lagerplatz') ? 'border-danger' : ''}}">
                                <option value="0" disabled>Bitte wählen</option>
                                {{-- Wird via AJAX gefüllt, ausser wenn old() vorhanden, dann vorbelegen --}}
                                @if(old('lagerplatz') !== null)
                                    @php
                                        $storagePlace = $storagePlaces->firstWhere('id', old('lagerplatz'));
                                        $storagePlaceName = isset($storagePlace['lagerplatz']) ? $storagePlace['lagerplatz'] : "";
                                    @endphp
                                    <option value="{{ old('lagerplatz') }}" selected>{{ $storagePlaceName }}</option>
                                @endif
                                @if($item->storage_place_id !== null)
                                    @php
                                        $storagePlace = $storagePlaces->firstWhere('id', $item->storage_place_id);
                                        $storagePlaceName = isset($storagePlace['lagerplatz']) ? $storagePlace['lagerplatz'] : "";
                                    @endphp
                                    <option value="{{ $item->storage_place_id }}" selected>{{ $storagePlaceName }}</option>
                                @endif
                            </select>
                            <small class="form-text text-danger">{!! $errors->first('lagerplatz') !!}</small>
                        </div>
                        <div id="restOfForm">
                            <div class="form-group row">
                                <label class="col-md-2" for="marke">Marke</label>
                                <select name="marke" id="marke"
                                        class="form-control form-control-sm col-md-10 {{ $errors->has('marke') ? 'border-danger' : ''}}">
                                    <option value="0">Bitte wählen</option>
                                    @foreach($brands as $b)
                                        <option
                                            value="{{ $b->id }}"
                                            {{ (old("marke") == $b->id || $item->brand_id == $b->id ? "selected":"") }}>
                                            {{ $b->marke }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{!! $errors->first('marke') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="name">Name</label>
                                <input type="text"
                                       class="form-control form-control-sm col-md-10 {{ $errors->has('name') ? 'border-danger' : ''}}"
                                       id="name" name="name" value="{{ old('name') ?? $item->name }}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="name2">Name 2</label>
                                <input type="text"
                                       class="form-control form-control-sm col-md-10 {{ $errors->has('name2') ? 'border-danger' : ''}}"
                                       id="name2" name="name2" value="{{ old('name2') ?? $item->name2 }}">
                                <small class="form-text text-danger">{!! $errors->first('name2') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="anzahl">Anzahl</label>
                                <input type="text"
                                       class="form-control form-control-sm col-md-10 {{ $errors->has('anzahl') ? 'border-danger' : ''}}"
                                       id="anzahl" name="anzahl" value="{{ old('anzahl') ?? $item->anzahl }}">
                                <small class="form-text text-danger">{!! $errors->first('anzahl') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="art">Art</label>
                                <select name="art" id="art"
                                        class="form-control form-control-sm col-md-10 {{ $errors->has('art') ? 'border-danger' : ''}}">
                                    <option value="0">Bitte wählen</option>
                                    @foreach($itemTypes as $iT)
                                        <option
                                            value="{{ $iT->id }}"
                                            {{ (old("art") == $iT->id || $item->item_type_id == $iT->id ? "selected":"") }}>
                                            {{ $iT->art }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{!! $errors->first('art') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="zustand">Zustand</label>
                                <select name="zustand" id="zustand"
                                        class="form-control form-control-sm col-md-10 {{ $errors->has('zustand') ? 'border-danger' : ''}}">
                                    <option value="0">Bitte wählen</option>
                                    @foreach($itemConditions as $iC)
                                        <option
                                            value="{{ $iC->id }}"
                                            {{ (old("zustand") == $iC->id || $item->item_condition_id == $iC->id ? "selected":"") }}>
                                            {{ $iC->zustand }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{!! $errors->first('zustand') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="beschreibung">Beschreibung</label>
                                <input type="text"
                                       class="form-control form-control-sm col-md-10 {{ $errors->has('beschreibung') ? 'border-danger' : ''}}"
                                       id="beschreibung" name="beschreibung"
                                       value="{{ old('beschreibung') ?? $item->beschreibung }}">
                                <small class="form-text text-danger">{!! $errors->first('beschreibung') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="artikelnummer">Artikel-Nr.</label>
                                <input type="text"
                                       class="form-control form-control-sm col-md-10 {{ $errors->has('artikelnummer') ? 'border-danger' : ''}}"
                                       id="artikelnummer" name="artikelnummer"
                                       value="{{ old('artikelnummer') ?? $item->artikel_nummer }}">
                                <small class="form-text text-danger">{!! $errors->first('artikelnummer') !!}</small>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="ean">EAN</label>
                                <input type="text"
                                       class="form-control form-control-sm col-md-10 {{ $errors->has('ean') ? 'border-danger' : ''}}"
                                       id="ean" name="ean" value="{{ old('ean') ?? $item->ean }}">
                                <small class="form-text text-danger">{!! $errors->first('ean') !!}</small>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-edit"></i> Änderung speichern
                        </button>
                        <button class="btn btn-secondary mt-4 ml-4" type="reset">
                            <i class="fas fa-undo mr-2"></i> Formular zurücksetzen
                        </button>
                        <a class="btn btn-primary mt-4 float-lg-right" href="/item">
                            <i class="fas fa-arrow-circle-up mr-2"></i>
                            Zurück
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
