<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use GuzzleHttp\Client;
use Config;
use Illuminate\Support\Facades\Session;

use Exception;
use Illuminate\Support\Facades\Log;

class Alumno extends Model
{

    public function Alumnos($Grupo)
    {
        try
        {
            $client = new Client();
            $res = $client->request('GET', env('HOST_API').'/api/GetAlumnos/'.$Grupo);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return json_decode($res->getBody());
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }

    public function AlumnosActivos($Grupo)
    {
        try
        {   
            $client = new Client();
            $res = $client->request('GET', env('HOST_API').'/api/GetAlumnosGrupo/'.$Grupo);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return json_decode($res->getBody());
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }

    public function Alumno($Matricula)
    {

        try
        {
            $client = new Client();
            $res = $client->request('GET', env('HOST_API').'/api/GetAlumno/'.$Matricula);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return json_decode($res->getBody());
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }

    public function AlumnoNuevo($request)
    {
        try
        {
            $Body=[];
            $Body['EstatusID']=$request->get('Estatu_Alumno');
            $Body['FechaNacimiento']=$request->get('FNacimiento');
            $Body['GradoEscolar']=Session::get('Grupo');
            $Body['Nombre']=$request->get('Nombre');
            $Body['Sexo']=$request->get('Genero_Alumno');
    
            $Body=json_encode($Body);
    
            $client = new Client();
    
            $res = $client->post(env('HOST_API').'/api/PostAlumno', ['body' => $Body]);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return json_decode($res->getBody());
            }

        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }

    public function AlumnoNuevoGrupo($request)
    {
        try
        {
            $Body=[];
            $Body['EstatusID']=$request->get('Estatu_Alumno');
            $Body['FechaNacimiento']=$request->get('FNacimiento');
            $Body['GradoEscolar']=$request->get('Grado_Escolar');
            $Body['Nombre']=$request->get('Nombre');
            $Body['Sexo']=$request->get('Genero_Alumno');
    
            $Body=json_encode($Body);
    
            $client = new Client();
    
            $res = $client->post(env('HOST_API').'/api/PostAlumno', ['body' => $Body]);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return json_decode($res->getBody());
            }

        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }

    public function ActualizaAlumno($Matricula,$request)
    {
        try
        {
            $Body=[];
            $Body['EstatusID']=$request->get('Estatu_Alumno');
            $Body['FechaNacimiento']=$request->get('FNacimiento');
            $Body['GradoEscolar']=$request->get('Grado_Escolar');
            $Body['Matricula']=$Matricula;
            $Body['Nombre']=$request->get('Nombre');
            $Body['Sexo']=$request->get('Genero_Alumno');

    
            $Body=json_encode($Body);
    
            $client = new Client();
    
            $res = $client->put(env('HOST_API').'/api/PutAlumno', ['body' => $Body]);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return json_decode($res->getBody());
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }

    public function DelAlumno($Matricula)
    {
        try
        {             
            $client = new Client();
            $res = $client->request('DELETE', env('HOST_API').'/api/DelAlumno/'.$Matricula);
    
            if($res->getStatusCode()!=200)
            {
                return "Error";
            }
            else
            {
                return "Correcto";
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return;    
        }
    }
}
