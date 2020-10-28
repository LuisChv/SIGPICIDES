<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SubTipoDeInvestigacion;
use App\TipoDeInvestigacion;

class TipoInvTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testECreate()
    {
        $this->withoutExceptionHandling();
        /* Inicio de sesión */
        $this->artisan('db:seed');
        $session = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'secret'
        ]);
        $session->assertStatus(302);
        /* Http request */
        $response = $this->get('/tipo_investigacion/create');
        $response->assertStatus(200);
        //$response->assertOk()
        $subtiposInv = SubTipoDeInvestigacion::all();
        $tiposInv = TipoDeInvestigacion::all();
        $response->assertViewIs('simpleViews.tipoInvestigacion.crearTipo');
        $response->assertViewHas('tipos', $tiposInv);
        $response->assertViewHas('sub_tipos', $subtiposInv);    
    }
}
