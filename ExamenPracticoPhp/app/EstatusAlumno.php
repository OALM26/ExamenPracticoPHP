<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusAlumno extends Model
{
    protected $table = "estatusalumno";

    protected $guarded = [];

    public function CargaEstatusAlumno()
    {
        $EstatusAlumno = EstatusAlumno::all();
        return $EstatusAlumno;
    }}
