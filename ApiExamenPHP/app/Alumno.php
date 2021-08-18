<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;
use GuzzleHttp\Client;
use Config;

use Exception;
use Illuminate\Support\Facades\Log;

class Alumno extends Model
{
    protected $table = "Alumno";

    protected $guarded = [];

    protected $primaryKey = 'Matricula';

    public $timestamps = false;

    public function CargaAlumnos()
    {
        try
        {
            $Alumnos = DB::select('CALL proc_CargaAlumnos();');
            $resultado = json_encode($Alumnos);
            return $resultado;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function CargaAlumno($Matricula)
    {
        try
        {
            $Alumno = DB::select('CALL proc_CargaAlumno(?)', [$Matricula]);
            return $Alumno;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function CargaEstatus()
    {
        try
        {
            $Estatus = DB::select('CALL proc_CargaEstatus();');
            $resultado = json_encode($Estatus);
            return $resultado;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function CargaGenero()
    {
        try
        {
            $Generos = DB::select('CALL proc_CargaGenero();');
            $resultado = json_encode($Generos);
            return $resultado;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function CargaGradoEscolar()
    {
        try
        {
            $Grados = DB::select('CALL proc_CargaGradoEscolar();');
            $resultado = json_encode($Grados);
            return $resultado;
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function InsAlumno($Estatus,$FechaNac,$GradoEsc,$Nombre,$SexoID)
    {
        try
        {
            DB::beginTransaction();

            $date = new DateTime(date("Y-m-d"));
            $date = $date->format('Y-m-d');
    
            $Alumno = DB::select('CALL proc_INS_ALUMNO(?,?,?,?,?,?)', [$Estatus,$FechaNac,$date,$GradoEsc,$Nombre,$SexoID]);  
            
            DB::commit();

            return "Resultado Exitoso";

        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }

    public function UpdAlumno($Estatus,$FechaNac,$GradoEsc,$Matricula,$Nombre,$SexoID)
    {
        try
        {
            DB::beginTransaction();

            $date = new DateTime(date("Y-m-d"));
            $date = $date->format('Y-m-d');
    
            $Alumno = DB::select('CALL proc_UpdAlumno(?,?,?,?,?,?,?)', [$Estatus,$FechaNac,$date,$GradoEsc,$Matricula,$Nombre,$SexoID]);  
            
            DB::commit();

            return "Resultado Exitoso";
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return response()->json(['error' => 'A ocurrido un error intentelo nuevamente'], 400);    
        }
    }
}
