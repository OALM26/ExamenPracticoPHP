<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class Alumno extends Model
{
    protected $table = "Alumno";

    protected $guarded = [];

    protected $primaryKey = 'Matricula';

    public $timestamps = false;

    public function CargaAlumnos()
    {
        $Alumnos = Alumno::join('genero', 'alumno.SexoID', '=', 'genero.Id')
        ->join('gradoescolar', 'alumno.GradoEscolarID', '=', 'gradoescolar.Id')
        ->join('estatusalumno', 'alumno.EstatusID', '=', 'estatusalumno.Id')
        ->select('alumno.Matricula as Matricula', 
                 'alumno.Nombre as Nombre',
                 'alumno.fechaNacimiento as FNacimiento',
                 'genero.Descripcion as Genero',
                 'gradoescolar.Descripcion as GradoEscolar',
                 'estatusalumno.Descripcion as Estatus_Alumno')
        ->orderBy('alumno.Matricula')
        ->get();
        
        return $Alumnos;  
    }

    public function Alumno($Matricula)
    {
        $Alumno = Alumno::join('genero', 'alumno.SexoID', '=', 'genero.Id')
        ->join('gradoescolar', 'alumno.GradoEscolarID', '=', 'gradoescolar.Id')
        ->join('estatusalumno', 'alumno.EstatusID', '=', 'estatusalumno.Id')
        ->select('alumno.Matricula as Matricula', 
                 'alumno.Nombre as Nombre',
                 'alumno.fechaNacimiento as FNacimiento',
                 'genero.Descripcion as Genero',
                 'gradoescolar.Descripcion as GradoEscolar',
                 'estatusalumno.Descripcion as Estatus_Alumno')
        ->where('Matricula','=',$Matricula)
        ->first();

        return $Alumno;
    }

    public function ActualizaAlumno($Matricula,$request)
    {
        DB::beginTransaction();
        
        $Alumno = Alumno::where('Matricula','=',$Matricula)->first();

        $Datos  =   [];

        $Datos['Nombre'] = $request->get('Nombre');

        if($request->get('FNacimiento')!=$Alumno->FechaNacimiento)
        {
           $Datos['FechaNacimiento'] =$request->get('FNacimiento');
        }
        if($request->get('Genero_Alumno')!='Default')
        {
            $Datos['SexoID'] =$request->get('Genero_Alumno');
        }
        if($request->get('Grado_Escolar')!='Default')
        {
            $Datos['GradoEscolarID'] =$request->get('Grado_Escolar');
        }
        if($request->get('Estatu_Alumno')!='Default')
        {
            $Datos['EstatusID'] = $request->get('Estatu_Alumno');
        }


        $Datos['Fecha_Modificación'] = new DateTime(date("d-m-Y"));

        $Alumno->update($Datos);

        DB::commit();
        
        return;
    }
}
