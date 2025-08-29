<div class="mb-3">
    <label for="beneficiario_id" class="form-label">Beneficiario</label>
    <select class="form-select" id="beneficiario_id" name="beneficiario_id">
        @foreach ($beneficiarios as $beneficiario)
            <option value="{{ $beneficiario->id }}" @selected(old('beneficiario_id', $consulta->beneficiario_id ?? '') == $beneficiario->id)>
                {{ $beneficiario->nombre }}
            </option>
        @endforeach
    </select>
    @error('beneficiario_id')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
<x-form.input type="date" name="fecha" label="Fecha" :value="$consulta->fecha ?? null" />
<x-form.input type="time" name="hora" label="Hora" :value="$consulta->hora ?? null" />
<div class="text-end">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
