<?php

namespace Tests\Feature;

use App\Models\TemaNomada;
use App\Models\ConferenciaNomada;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConferenciaNomadaTest extends TestCase
{
    use RefreshDatabase;

    public function test_filtrar_por_mes(): void
    {
        $tema = TemaNomada::create(['nombre' => 'Salud']);
        ConferenciaNomada::create([
            'tema_nomada_id' => $tema->id,
            'titulo' => 'Conferencia mayo',
            'fecha' => '2024-05-10',
            'municipio' => 'A',
        ]);
        ConferenciaNomada::create([
            'tema_nomada_id' => $tema->id,
            'titulo' => 'Conferencia junio',
            'fecha' => '2024-06-10',
            'municipio' => 'A',
        ]);

        $response = $this->getJson('/conferencias-nomada?mes=5');

        $response->assertStatus(200)->assertJsonCount(1);
    }

    public function test_filtrar_por_municipio(): void
    {
        $tema = TemaNomada::create(['nombre' => 'Educacion']);
        ConferenciaNomada::create([
            'tema_nomada_id' => $tema->id,
            'titulo' => 'Conf A',
            'fecha' => '2024-05-10',
            'municipio' => 'X',
        ]);
        ConferenciaNomada::create([
            'tema_nomada_id' => $tema->id,
            'titulo' => 'Conf B',
            'fecha' => '2024-05-11',
            'municipio' => 'Y',
        ]);

        $response = $this->getJson('/conferencias-nomada?municipio=X');

        $response->assertStatus(200)->assertJsonCount(1)->assertJsonFragment(['municipio' => 'X']);
    }
}
