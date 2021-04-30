<div class="accordion" id="accordionSearch">
    <div class="card text-primary">
        <div id="collapseOne" class="collapse show" aria-labelledby="headingSearch" data-parent="#accordionSearch">
            <div class="card-body">
                <form action="{{ route('item.search') }}" method="post">
                    <fieldset>
                        @csrf

                        <div class="container-xl">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lager">Lager</label>
                                        <select name="lager" id="lager"
                                                class="form-control form-control-sm {{ $errors->has('lager') ? 'border-danger' : ''}}">
                                            <option value="0">Bitte wählen</option>
                                            @foreach($warehouses as $w)
                                                <option value="{{ $w->id }}" {{ $oldWarehouse == $w->id ? "selected":"" }}> {{ $w->lager }} </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="lagerortGruppe" class="form-group">
                                        <label for="lagerort">Lagerort</label>
                                        <select name="lagerort" id="lagerort"
                                                class="form-control form-control-sm {{ $errors->has('lagerort') ? 'border-danger' : ''}}">
                                            <option value="0">Bitte wählen</option>
                                            @foreach($storageLocation as $sL)
                                                <option value="{{ $sL->id }}" {{ $oldStorageLocation == $sL->id ? "selected":"" }}> {{ $sL->lagerort }} </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-danger">{!! $errors->first('lagerort') !!}</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="lagerplatzGruppe" class="form-group">
                                        <label for="lagerplatz">Lagerplatz</label>
                                        <select name="lagerplatz" id="lagerplatz"
                                                class="form-control form-control-sm {{ $errors->has('lagerplatz') ? 'border-danger' : ''}}">
                                            <option value="0">Bitte wählen</option>
                                            @foreach($storagePlace as $sP)
                                                <option value="{{ $sP->id }}" {{ $oldStoragePlace == $sP->id ? "selected":"" }}> {{ $sP->lagerplatz }} </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-danger">{!! $errors->first('lagerplatz') !!}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-4" type="submit">
                            <i class="fas fa-search"></i> Suchen
                        </button>

                        <a class="btn btn-secondary mt-4 float-lg-right" href="/item">
                            <i class="fas fa-undo mr-2"></i>
                            Filter löschen
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>




