<x-form.input name="anio" label="Año" type="number" :value="$periodo->anio ?? null" />
<x-form.input name="mes" label="Mes" type="number" :value="$periodo->mes ?? null" />
<div class="text-end">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>

