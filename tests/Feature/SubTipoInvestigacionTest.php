<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SubTipoDeInvestigacion;
use App\TipoDeInvestigacion;

class SubTipoInvestigacionTest extends TestCase
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
            'email' => 'admin@gmail.com',
            'password' => 'secret'
        ]);

        $session->assertStatus(302);

        //Inicio del caso de prueba para creación de los subtipos de investigacion
        //petición HTTP
        $response = $this->get('/subtipo_investigacion/create');
        $response->assertStatus(200);

        //$sub_tipos= SubTipoDeInvestigacion::all();
        $tiposinv=TipoDeInvestigacion::all();

        $response->assertViewIs('simpleViews.subtipoInvestigacion.crear');
        $response->assertViewHas('tiposinv', $tiposinv);
    }

    public function testStore(){
        $this->withoutExceptionHandling();
        /* Inicio de sesión */
        $this->artisan('db:seed');
        
        $session = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'secret'
        ]);

        $session->assertStatus(302);

        //Inicio de caso de prueba para creación (store) de subtipos de inv.
        $response = $this->post('/subtipo_investigacion', [
            'nombre'=> "SubTipoTEST",
            'tipoRec'=> 1
        ]);
        
        //en caso de que se guardara deberia contar 11 subtipos
        $this->assertCount(11, SubTipoDeInvestigacion::all());

        $subtipo = SubTipoDeInvestigacion::orderBy('id', 'desc')->first();

        $this->assertEquals($subtipo->nombre, "SubTipoTEST");
        $this->assertEquals($subtipo->id_tipo, 1);

        $response->assertRedirect('/tipo_investigacion');
    }
    
}
