<?php

use Illuminate\Database\Seeder;

class RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recurso')->insert([
            'id_marca' => 1,
            'id_tipo' => 1,
            'nombre' => 'ProBook',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 1,
            'descripcion' => 'Windows 10 Pro 64, Procesador Intel® Core™ i7-10510U, Pantalla FHD, Memoria 16 GB DDR4-2400 SDRAM, Disco duro 512 GB, Gráficos Intel® UHD 620.',
            'modelo' => '450 G7',
        ]);
        
        DB::table('recurso')->insert([
            'id_marca' => 2,
            'id_tipo' => 1,
            'nombre' => 'Inspiron',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 2,
            'descripcion' => 'Laptop de 13 pulgadas con un diseño delgado y liviano y una gran cantidad de funciones, que incluyen PCIe SSD y procesadores Intel® Core™ de 10.ª generación.',
            'modelo' => 'Serie 7000',
        ]);

        DB::table('recurso')->insert([
            'id_marca' => 3,
            'id_tipo' => 1,
            'nombre' => 'VivoBook',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 3,
            'descripcion' => 'Procesador Intel® Core™ i5 7200U, Windows 10 Home, 16 GB SDRAM, Pantalla FHD 15.6, Integrated Intel HD Graphics, 256GB SATA3 M.2 SSD',
            'modelo' => 'S15 S510UA',
        ]);
        
        DB::table('recurso')->insert([
            'id_marca' => 4,
            'id_tipo' => 1,
            'nombre' => 'ThinkPad',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 4,
            'descripcion' => 'Core™ i7 de 8va generación con tecnología vPro™, Windows 10 Pro, LPDDR3 de hasta 16 GB, Pantalla FHD 15.6.',
            'modelo' => 'X1 Yoga',
        ]);

        DB::table('recurso')->insert([
            'id_marca' => 1,
            'id_tipo' => 2,
            'nombre' => 'Papel bond',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 5,
            'descripcion' => 'Paquete de páginas de papel bond tamaño carta.',
            'modelo' => '-',
        ]);
        
        DB::table('recurso')->insert([
            'id_marca' => 2,
            'id_tipo' => 2,
            'nombre' => 'Lapiz N3',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 6,
            'descripcion' => 'Paquete de 12 lápices numero 3',
            'modelo' => '--',
        ]);

        DB::table('recurso')->insert([
            'id_marca' => 3,
            'id_tipo' => 3,
            'nombre' => 'Escritorio',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 7,
            'descripcion' => 'Escritorio con capacidad para una computadora de escritorio e impresora.',
            'modelo' => '--',
        ]);
        
        DB::table('recurso')->insert([
            'id_marca' => 4,
            'id_tipo' => 3,
            'nombre' => 'Silla',
        ]);

        DB::table('detalle_de_recurso')->insert([
            'id_recurso' => 8,
            'descripcion' => 'Silla de oficina con capacidad para 300 libras',
            'modelo' => '--',
        ]);
        
    }
}
