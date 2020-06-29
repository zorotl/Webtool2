<form action="/item/search" method="post">
    <fieldset class="border border-secondary rounded-lg p-4">
        @csrf
        <div class="form-group">
            <label for="lager">Lager</label>
            <select name="lager" id="lager"
                    class="form-control form-control-sm col-md-10 {{ $errors->has('lager') ? 'border-danger' : ''}}">
                <option value="0">Bitte wählen</option>
                @foreach($warehouses as $w)
                    <option value="{{ $w->id }}"> {{ $w->lager }} </option>
                @endforeach
            </select>
            <small class="form-text text-danger">{!! $errors->first('lager') !!}</small>
        </div>
        <button class="btn btn-primary mt-4" type="submit">
            <i class="fas fa-search"></i> Suchen
        </button>
    </fieldset>
</form>
