<div class="mb-3">
    <label for="periodo_escolar_id" class="form-label">Periodo Escolar</label>
    <select name="periodo_escolar_id" id="periodo_escolar_id" class="form-select">
        @foreach ($periodos as $periodo)
            <option value="{{ $periodo->id }}" @selected(old('periodo_escolar_id', $beca->periodo_escolar_id ?? '') == $periodo->id)>
                {{ $periodo->nombre }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="beneficiario_id" class="form-label">Beneficiario</label>
    <select name="beneficiario_id" id="beneficiario_id" class="form-select">
        @foreach ($beneficiarios as $beneficiario)
            <option value="{{ $beneficiario->id }}" @selected(old('beneficiario_id', $beca->beneficiario_id ?? '') == $beneficiario->id)>
                {{ $beneficiario->nombre }}
            </option>
        @endforeach
    </select>
</div>
<x-form.input name="porcentaje" label="Porcentaje" type="number" :value="$beca->porcentaje ?? null" />
<div class="text-end">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
