<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use GuzzleHttp\Client;
use Config;


class Alumno extends Model
{

    public function Alumnos()
    {
        $client = new Client();
        $res = $client->request('GET', env('HOST_API').'/api/GetAlumnos');

        if($res->getStatusCode()!=200)
        {
            return "Error";
        }
        else
        {
            return json_decode($res->getBody());
        }
    }

    public function Alumno($Matricula)
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

    public function AlumnoNuevo($request)
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


    // public function Alumno($Matricula)
    // {
    //     $Alumno = Alumno::join('genero', 'alumno.SexoID', '=', 'genero.Id')
    //     ->join('gradoescolar', 'alumno.GradoEscolarID', '=', 'gradoescolar.Id')
    //     ->join('estatusalumno', 'alumno.EstatusID', '=', 'estatusalumno.Id')
    //     ->select('alumno.Matricula as Matricula', 
    //              'alumno.Nombre as Nombre',
    //              'alumno.fechaNacimiento as FNacimiento',
    //              'genero.Descripcion as Genero',
    //              'gradoescolar.Descripcion as GradoEscolar',
    //              'estatusalumno.Descripcion as Estatus_Alumno')
    //     ->where('Matricula','=',$Matricula)
    //     ->first();

    //     return $Alumno;
    // }

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
