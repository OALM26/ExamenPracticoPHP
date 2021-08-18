<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alumno;
use App\GradoEscolarAlumno;
use App\EstatusAlumno;
use App\GeneroAlumno;

class AlumnoController extends Controller
{
    public function Index()
    {
        $Alumnos = new Alumno();
        $Alumnos = $Alumnos->CargaAlumnos();

        return view('Alumnos',compact('Alumnos'));
    }

    public function Create()
    {
        $GradosEscolar = new GradoEscolarAlumno();
        $GradosEscolar = $GradosEscolar->CargaGradoEscolar();

        $Estatus_Alumno = new EstatusAlumno();
        $Estatus_Alumno = $Estatus_Alumno->CargaEstatusAlumno();

        $Generos_Alumno = new GeneroAlumno();
        $Generos_Alumno = $Generos_Alumno->GenerosAlumno();

        return view('AlumnoCreate',compact('GradosEscolar','Estatus_Alumno','Generos_Alumno'));
    }

    public function Save(Request $request)
    {
        $this->validate($request,
        [
            'Nombre' => 'required|string|min:15|max:200|nullable',
            'Grado_Escolar' => 'required|not_in:Default',
            'Genero_Alumno' => 'required|not_in:Default',
            'Estatu_Alumno' => 'required|not_in:Default',
            'FNacimiento' => 'nullable|date|before:today'
        ]);
        
        $Alumno = new Alumno();
        $Alumno = $Alumno->AlumnoNuevo($request);
       
        return redirect()->route('Alumnos')->with('alert_alumno','Alumno registrado correctamente');
        
    }

    public function Edit($Matricula)
    {
        $Alumno = new Alumno();
        $Alumno = $Alumno->Alumno($Matricula);

        $GradosEscolar = new GradoEscolarAlumno();
        $GradosEscolar = $GradosEscolar->CargaGradoEscolar();

        $Estatus_Alumno = new EstatusAlumno();
        $Estatus_Alumno = $Estatus_Alumno->CargaEstatusAlumno();

        $Generos_Alumno = new GeneroAlumno();
        $Generos_Alumno = $Generos_Alumno->GenerosAlumno();

        return view('AlumnoEdit',compact('Alumno','Matricula','GradosEscolar','Estatus_Alumno','Generos_Alumno'));
    }
    
    public function Update(Request $request, $Matricula)
    {
        $this->validate($request,
        [
            'Nombre' => 'required|string|min:15|max:200|nullable',
            'FNacimiento' => 'nullable|date'
        ]);
        
        $Alumno = new Alumno();
        $Alumno = $Alumno->ActualizaAlumno($Matricula,$request);

        return redirect()->route('Alumnos')->with('alert_alumno','Alumno actualizado correctamente');

    }

    Public function Delete($Matricula)
    {
        dd($Matricula);
    }
}
