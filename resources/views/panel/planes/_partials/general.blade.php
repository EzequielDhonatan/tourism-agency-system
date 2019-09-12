<div class="form-group">
    <label for="brand_id">Marca</label>
    <select class="form-control" id="brand_id" name="brand_id">
        <option value="">Selecione</option>
        @foreach($brands as $brand_id)
            <option value="{{ $brand_id->id }}"
            @if( (isset($plane) && $plane->brand_id == $brand_id->id) || old('brand_id') == $brand_id->id )
                selected
            @endif
            >{{ $brand_id->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="qty_passengers">Quantidade de passageiros</label>
    <input type="number" class="form-control" name="qty_passengers" id="qty_passengers" value="{{ $plane->qty_passengers ?? old('qty_passengers') }}">
</div>

<div class="form-group">
    <label for="class_id">Classe</label>
    <select class="form-control" id="class_id" name="class_id">
        <option value="">Selecione</option>
        @foreach($classes as $class_id)
            <option value="{{ $class_id->id }}"
            @if( (isset($plane) && $plane->class_id == $class_id->id) || old('class_id') == $class_id->id )
                selected
            @endif
            >{{ $class_id->name }}</option>
        @endforeach
    </select>
</div>