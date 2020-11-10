<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SubTipoDeInvestigacion;
use App\TipoDeInvestigacion;
use App\Proyecto;
use App\Solicitud;
use App\EquipoDeInvestigacion; 

class SolicitudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;


    public function testCreate()
    {
        $this->withoutExceptionHandling();
        /* Inicio de sesión */
        $this->artisan('db:seed');
        
        $session = $this->post('/login', [
            'email' => 'investigador@gmail.com',
            'password' => 'secret'
        ]);

        $session->assertStatus(302);

        /* Http request */
        $response = $this->get('/solicitud/create');
        $response->assertStatus(200);
        //$response->assertOk()

        $subtipos = SubTipoDeInvestigacion::all();
        $tipos = TipoDeInvestigacion::all();

        $response->assertViewIs('proyectoViews.solicitud.Investigador.crear');
        $response->assertViewHas('tiposinv', $tipos);
        $response->assertViewHas('sub_tipos', $subtipos);
    }
    
    public function testStore(){    
        $this->withoutExceptionHandling();
        /* Inicio de sesión */
        $this->artisan('db:seed');
        $session = $this->post('/login', [
            'email' => 'investigador@gmail.com',
            'password' => 'secret'
        ]);

        $session->assertStatus(302);

        /* Http request */
        $response = $this->post('/solicitud', [
            'nombre'=> "Proyecto TEST",
            'tipoRec'=> 1,
            'subtipo'=> 1,
            'descripcion'=> "Descripción TEST", 
            'tema'=> "Tema TEST",
            'justificacion'=> "Justificación TEST",
            'resultados'=> "Resultados TEST",
            'duracion'=> 1,
            'miembros'=> 1,
            'costo'=> 550
        ]);

        $this->assertCount(1, Proyecto::all());

        $solicitud = Solicitud::first();
        $proyecto = Proyecto::first();
        $equipo = EquipoDeInvestigacion::first();

        $this->assertEquals($proyecto->nombre, "Proyecto TEST");
        $this->assertEquals($proyecto->id_subtipo, 1);
        $this->assertEquals($proyecto->descripcion, "Descripción TEST");
        $this->assertEquals($proyecto->tema, "Tema TEST");
        $this->assertEquals($proyecto->justificacion, "Justificación TEST");
        $this->assertEquals($proyecto->resultados, "Resultados TEST");
        $this->assertEquals($proyecto->duracion, 1);
        $this->assertEquals($proyecto->costo, 550);
        $this->assertEquals($equipo->miembros, 1);
        $this->assertEquals($solicitud->id_proy, $proyecto->id);

        $response->assertRedirect('proyecto/oai/1');
    }
}
