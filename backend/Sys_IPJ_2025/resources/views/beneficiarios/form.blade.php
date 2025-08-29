<x-form.input name="nombre" label="Nombre" :value="$beneficiario->nombre ?? null" />
<x-form.input name="curp" label="CURP" :value="$beneficiario->curp ?? null" />
<x-form.input name="folio_tarjeta" label="Folio de tarjeta" :value="$beneficiario->folio_tarjeta ?? null" />
<div class="text-end">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
