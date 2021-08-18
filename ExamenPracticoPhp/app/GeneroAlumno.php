<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneroAlumno extends Model
{
    protected $table = "genero";

    protected $guarded = [];

    public function GenerosAlumno()
    {
        $GenerosAlumno = GeneroAlumno::all();
        return $GenerosAlumno;
    }}
