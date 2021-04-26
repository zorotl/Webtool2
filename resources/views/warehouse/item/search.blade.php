<form action="{{ route('item.search') }}" method="post">
    <fieldset class="border border-secondary rounded-lg p-4">
        @csrf
        <div class="row">
        <div class="form-group">
            <label for="lager">Lager</label>
            <select name="lager" id="lager"
                    class="form-control form-control-sm col-md-4 {{ $errors->has('lager') ? 'border-danger' : ''}}">
                <option value="0">Bitte wählen</option>
                @foreach($warehouses as $w)
                    <option value="{{ $w->id }}" {{ $oldWarehouse == $w->id ? "selected":"" }}> {{ $w->lager }} </option>
                @endforeach
            </select>
            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
        </div>

        <div id="lagerortGruppe" class="form-group">
            <label for="lagerort">Lagerort</label>
            <select name="lagerort" id="lagerort"
                    class="form-control form-control-sm col-md-4 {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                <option value="0" disabled="disabled">Bitte wählen</option>
                {{-- Wird via AJAX gefüllt, ausser wenn old() vorhanden, dann vorbelegen --}}
                @if(old('lagerort') !== null)
                    @php
                        $storageLocation = $storageLocations->firstWhere('id', old('lagerort'));
                        $storageLocationName = isset($storageLocation['lagerort']) ? $storageLocation['lagerort'] : "";
                    @endphp
                    <option value="{{ old('lagerort') }}" selected>{{ $storageLocationName }}</option>
                @endif
            </select>
            <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
        </div>

        <div id="lagerplatzGruppe" class="form-group">
            <label for="lagerplatz">Lagerplatz</label>
            <select name="lagerplatz" id="lagerplatz"
                    class="form-control form-control-sm col-md-4 {{ $errors->has('lagerplatz') ? 'border-danger' : ''}}">
                <option value="0" disabled>Bitte wählen</option>
                {{-- Wird via AJAX gefüllt, ausser wenn old() vorhanden, dann vorbelegen --}}
                @if(old('lagerplatz') !== null)
                    @php
                        $storagePlace = $storagePlaces->firstWhere('id', old('lagerplatz'));
                        $storagePlaceName = isset($storagePlace['lagerplatz']) ? $storagePlace['lagerplatz'] : "";
                    @endphp
                    <option value="{{ old('lagerplatz') }}" selected>{{ $storagePlaceName }}</option>
                @endif
            </select>
            <small class="form-text text-danger">{!! $errors->first('lagerplatz') !!}</small>
        </div>
        </div>

        <button class="btn btn-primary mt-4" type="submit">
            <i class="fas fa-search"></i> Suchen
        </button>
    </fieldset>
</form>

