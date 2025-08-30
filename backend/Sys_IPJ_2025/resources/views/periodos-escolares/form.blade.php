<x-form.input name="nombre" label="Nombre" :value="$periodo->nombre ?? null" />
<x-form.input name="fecha_inicio" label="Fecha de inicio" type="date" :value="$periodo->fecha_inicio ?? null" />
<x-form.input name="fecha_fin" label="Fecha de fin" type="date" :value="$periodo->fecha_fin ?? null" />
<div class="text-end">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
