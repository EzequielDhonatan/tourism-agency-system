<div class="form-group">
    <label for="plane_id">Avião</label>
    <select class="form-control @error('plane_id') is-invalid @enderror" id="plane_id" name="plane_id">
        <option value="">Selecione</option>
        @foreach($planes as $plane_id)
            <option value="{{ $plane_id->id }}"
            @if( (isset($flight) && $flight->plane_id == $plane_id->id) || old('plane_id') == $plane_id->id )
                selected
            @endif
            >{{ $plane_id->brand_id }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="airport_origin_id">Origem</label>
    <select class="form-control @error('airport_origin_id') is-invalid @enderror" id="airport_origin_id" name="airport_origin_id">
        <option value="">Selecione</option>
        @foreach($airports as $airport_origin_id)
            <option value="{{ $airport_origin_id->id }}"
            @if( (isset($flight) && $flight->airport_origin_id == $airport_origin_id->id) || old('airport_origin_id') == $airport_origin_id->id )
                selected
            @endif
            >{{ $airport_origin_id->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="airport_destination_id">Destino</label>
    <select class="form-control @error('airport_destination_id') is-invalid @enderror" id="airport_destination_id" name="airport_destination_id">
        <option value="">Selecione</option>
        @foreach($airports as $airport_destination_id)
            <option value="{{ $airport_destination_id->id }}"
            @if( (isset($flight) && $flight->airport_destination_id == $airport_destination_id->id) || old('airport_destination_id') == $airport_destination_id->id )
                selected
            @endif
            >{{ $airport_destination_id->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="date">Data</label>
    <input type="date" class="form-control" name="date" id="date" value="{{ $flight->date ?? old('date') }}">
</div>

<div class="form-group">
    <label for="time_duration">Duração</label>
    <input type="time" class="form-control" name="time_duration" id="time_duration" value="{{ $flight->time_duration ?? old('time_duration') }}">
</div>

<div class="form-group">
    <label for="hour_output">Saída</label>
    <input type="time" class="form-control" name="hour_output" id="hour_output" value="{{ $flight->hour_output ?? old('hour_output') }}">
</div>

<div class="form-group">
    <label for="arrival_time">Chegada</label>
    <input type="time" class="form-control" name="arrival_time" id="arrival_time" value="{{ $flight->arrival_time ?? old('arrival_time') }}">
</div>

<div class="form-group">
    <label for="old_price">Preço antigo</label>
    <input type="text" class="form-control" name="old_price" id="old_price" value="{{ $flight->old_price ?? old('old_price') }}">
</div>

<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" class="form-control" name="price" id="price" value="{{ $flight->price ?? old('price') }}">
</div>

<div class="form-group">
    <label for="total_plots">Total de parcelas</label>
    <input type="text" class="form-control" name="total_plots" id="total_plots" value="{{ $flight->total_plots ?? old('total_plots') }}">
</div>

<div class="form-group">
    <label for="qty_stops">Paradas</label>
    <input type="text" class="form-control" name="qty_stops" id="qty_stops" value="{{ $flight->qty_stops ?? old('qty_stops') }}">
</div>

<div class="form-group">
    <label for="is_promotion">Promoção</label>
    <input type="checkbox" class="form-control" name="is_promotion" id="is_promotion" value="{{ $flight->is_promotion ?? old('is_promotion') || true }}">
</div>

<div class="form-group">
    <label for="image">Imagem</label>
    <input type="file" class="form-control" name="image" id="image" value="{{ $flight->image ?? old('image') }}">
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    <textarea cols="170" rows="10" id="description" name="description"></textarea>
</div>