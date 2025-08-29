<div class="mb-3">
    <label for="periodo_id" class="form-label">Periodo</label>
    <select name="periodo_id" id="periodo_id" class="form-select">
        @foreach ($periodos as $periodo)
            <option value="{{ $periodo->id }}" @selected(old('periodo_id', $grupo->periodo_id ?? null) == $periodo->id)>
                {{ $periodo->mes }}/{{ $periodo->anio }}
            </option>
        @endforeach
    </select>
    @error('periodo_id')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
<x-form.input name="horario" label="Horario" :value="$grupo->horario ?? null" />
<x-form.input name="cupo_total" label="Cupo total" type="number" :value="$grupo->cupo_total ?? null" />
<div class="text-end">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>

