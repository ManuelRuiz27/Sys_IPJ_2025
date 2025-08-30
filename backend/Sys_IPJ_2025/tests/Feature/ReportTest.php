<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_basic_report_returns_counts(): void
    {
        $response = $this->getJson('/reports/basic');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'beneficiarios',
                'programas',
                'periodos',
                'grupos',
                'consultas_psicologicas',
                'becas',
                'temas_nomada',
                'conferencias_nomada',
            ]);
    }
}

