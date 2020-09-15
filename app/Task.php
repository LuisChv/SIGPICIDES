<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Esto sirve para que al cargar el Gantt las subtareas se muestren desplegadas
    //protected $appends = ["open"]; 
    public function getOpenAttribute(){
        return true;
    }
}
