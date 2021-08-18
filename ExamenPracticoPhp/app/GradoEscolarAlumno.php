<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradoEscolarAlumno extends Model
{
    protected $table = "gradoescolar";

    protected $guarded = [];

    public function CargaGradoEscolar()
    {
        $GradosEscolares = GradoEscolarAlumno::all();
        return $GradosEscolares;
    }
}
