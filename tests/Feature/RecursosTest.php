<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Recursos;
use App\TipoDeRecursos;
use App\Marca;
use App\DetalleDeRecurso;

class RecursosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testCreate(){
        $this->withoutExceptionHandling();
        /* Inicio de sesión */
        $this->artisan('db:seed');
        
        $session = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'secret'
        ]);

        $session->assertStatus(302);

        /* Http request */
        $response = $this->get('/recursos/create');
        $response->assertStatus(200);

        $recursos = Recursos::all();
        $marcas = Marca::all();
        $tiporec = TipoDeRecursos::all();

        $response->assertViewIs('simpleViews.recursos.crear');
        $response->assertViewHas('tiposrec', $tiporec);
        $response->assertViewHas('marcas', $marcas);
        $response->assertViewHas('recursos', $recursos);
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
    
            
            /* Http request */
            $response = $this->post('/recursos', [
                'tipoRec'=> 1,
                'nombre'=> "PCTest",
                'marca'=> 3,
                'modelo'=> "Modelo TEST",
                'descripcion'=> "Descripción TEST"
            ]);
            
            //$response->assertRedirect('/recursos');
            $this->assertCount(9, Recursos::all());

            $recurso = Recursos::orderBy('id', 'desc')->first();
            $detalleRecurso = DetalleDeRecurso::orderBy('id', 'desc')->first();

            $this->assertEquals($recurso->id_tipo, 1);
            $this->assertEquals($recurso->nombre, "PCTest");
            $this->assertEquals($recurso->id_marca, 3);
            $this->assertEquals($detalleRecurso->modelo, "Modelo TEST");
            $this->assertEquals($detalleRecurso->descripcion, "Descripción TEST");

            $response->assertRedirect('/recursos');
    }
}
