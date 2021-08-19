<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

use Exception;
use Illuminate\Support\Facades\Log;

class ApiAlumnoController extends Controller
{
    public function GetAlumnos(Request $request)
    {
        try
        {
            $Alumnos = new Alumno;
            $Alumnos = $Alumnos->CargaAlumnos($request->Grupo);
    
            return $Alumnos;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function GetAlumno(Request $request)
    {

        try
        {
            $Alumnos = new Alumno;
            $Alumnos = $Alumnos->CargaAlumno($request->Matricula);

            return $Alumnos;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function GetEstatus()
    {
        try
        {
            $Estatus = new Alumno;
            $Estatus = $Estatus->CargaEstatus();
    
            return $Estatus;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function GetGenero()
    {
        try
        {
            $Genero = new Alumno;
            $Genero = $Genero->CargaGenero();
    
            return $Genero;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function GetGradoEscolar()
    {
        try
        {
            $Grados = new Alumno;
            $Grados = $Grados->CargaGradoEscolar();
    
            return $Grados;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }
    
    public function PostAlumno(Request $request)
    {
        try
        {
            $Body = json_decode($request->getContent(),true);
            $Alumno = new Alumno;
    
            $Alumno = $Alumno->InsAlumno($Body['EstatusID'],$Body['FechaNacimiento'],$Body['GradoEscolar'],$Body['Nombre'],$Body['Sexo']);
    
            return $Alumno;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function PutAlumno(Request $request)
    {
        try
        {
            $Body = json_decode($request->getContent(),true);

            $Alumno = new Alumno;
    
            $Alumno = $Alumno->UpdAlumno($Body['EstatusID'],$Body['FechaNacimiento'],$Body['GradoEscolar'],$Body['Matricula'],$Body['Nombre'],$Body['Sexo']);
    
            return $Alumno;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function DelAlumno(Request $request)
    {
        try
        {
            $Body = json_decode($request->getContent(),true);
            $Alumno = new Alumno;
    
            $Alumno = $Alumno->DelAlumno($request->Matricula);
    
            return $Alumno;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function GetAlumnosGrupo(Request $request)
    {
        try
        {
            $Alumnos = new Alumno;
    
            $Alumnos = $Alumnos->CargaAlumnosGrupo($request->Grupo);
    
            return $Alumnos;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }
}
