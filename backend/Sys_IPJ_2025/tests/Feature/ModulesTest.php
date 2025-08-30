<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModulesTest extends TestCase
{
    use RefreshDatabase;

    public function test_beneficiarios_index_page_loads(): void
    {
        $response = $this->get('/beneficiarios');
        $response->assertStatus(200);
    }

    public function test_programas_index_page_loads(): void
    {
        $response = $this->get('/programas');
        $response->assertStatus(200);
    }

    public function test_periodos_index_page_loads(): void
    {
        $response = $this->get('/periodos');
        $response->assertStatus(200);
    }

    public function test_periodos_escolares_index_page_loads(): void
    {
        $response = $this->get('/periodos-escolares');
        $response->assertStatus(200);
    }

    public function test_becas_index_page_loads(): void
    {
        $response = $this->get('/becas');
        $response->assertStatus(200);
    }

    public function test_grupos_index_page_loads(): void
    {
        $response = $this->get('/grupos');
        $response->assertStatus(200);
    }

    public function test_consultas_psicologicas_index_page_loads(): void
    {
        $response = $this->get('/consultas-psicologicas');
        $response->assertStatus(200);
    }

    public function test_temas_nomada_index_page_loads(): void
    {
        $response = $this->get('/temas-nomada');
        $response->assertStatus(200);
    }

    public function test_conferencias_nomada_index_page_loads(): void
    {
        $response = $this->get('/conferencias-nomada');
        $response->assertStatus(200);
    }
}

