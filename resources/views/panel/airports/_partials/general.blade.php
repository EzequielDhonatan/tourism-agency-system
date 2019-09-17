<div class="form-group">
    <label for="city_id">Cidade</label>
    <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
        <option value="">Selecione</option>
        @foreach($cities as $city_id)
            <option value="{{ $city_id->id }}"
            @if( (isset($airport) && $airport->city_id == $city_id->id) || old('city_id') == $city_id->id )
                selected
            @endif
            >{{ $city_id->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $airport->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="zip_code">CEP</label>
    <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $airport->zip_code ?? old('zip_code') }}">
</div>

<div class="form-group">
    <label for="address">Endereço</label>
    <input type="text" class="form-control" name="address" id="address" value="{{ $airport->address ?? old('address') }}">
</div>

<div class="form-group">
    <label for="number">Número</label>
    <input type="number" class="form-control" name="number" id="number" value="{{ $airport->number ?? old('number') }}">
</div>

<div class="form-group">
    <label for="complement">Complemento</label>
    <input type="text" class="form-control" name="complement" id="complement" value="{{ $airport->complement ?? old('complement') }}">
</div>

<div class="form-group">
    <label for="latitude">Latitude</label>
    <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $airport->latitude ?? old('latitude') }}">
</div>

<div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $airport->longitude ?? old('longitude') }}">
</div>