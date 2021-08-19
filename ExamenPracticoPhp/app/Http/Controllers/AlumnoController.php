<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alumno;
use App\GradoEscolarAlumno;
use App\EstatusAlumno;
use App\GeneroAlumno;
use Illuminate\Support\Facades\Session;

use Exception;
use Illuminate\Support\Facades\Log;

class AlumnoController extends Controller
{
    public function Index()
    {
        try
        {
            $GradosEscolar = new GradoEscolarAlumno();
            $GradosEscolar = $GradosEscolar->CargaGradoEscolar();
            
            return view('Home',compact('GradosEscolar'));
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return view('Error');
        }
    }

    public function Alumnos(Request $request)
    {
        $this->validate($request,
        [
            'tipo' => 'required',
            'Grado_Escolar' => 'required|not_in:Default'
        ]);
        
        try
        {
            $Alumnos = new Alumno();
            $Grupo = $request->Grado_Escolar;
    
            Session::put('Grupo', $Grupo);
            Session::put('tipo', $request->tipo);
    
            if($request->tipo=="activos")
            {
                $Alumnos = $Alumnos->AlumnosActivos($Grupo);
                if(count($Alumnos)==0)
                {
                    return redirect()->route('/')->with('alert_alumno','No se encuentran alumnos de momento, con los requisitos solicitados!!');
                }
                else
                {
                    return view('Alumnos',compact('Alumnos'));
                }
            }
            else
            {
                $Alumnos = $Alumnos->Alumnos($Grupo);
                if(count($Alumnos)==0)
                {
                    return redirect()->route('/')->with('alert_alumno','No se encuentran alumnos de momento, con los requisitos solicitados!!');
                }
                else
                {
                    return view('Alumnos',compact('Alumnos'));
                }
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }

    public function AlumnosList()
    {
        try
        {
            $Alumnos = new Alumno();

            if(Session::get('tipo')=="activos")
            {
                $Alumnos = $Alumnos->AlumnosActivos(Session::get('Grupo'));
                if(count($Alumnos)==0)
                {
                    return redirect()->route('/')->with('alert_alumno','No se encuentran alumnos de momento, con los requisitos solicitados!!');
                }
                else
                {
                    return view('Alumnos',compact('Alumnos'));
                }
            }
            else
            {
                $Alumnos = $Alumnos->Alumnos(Session::get('Grupo'));
                if(count($Alumnos)==0)
                {
                    return redirect()->route('/')->with('alert_alumno','No se encuentran alumnos de momento, con los requisitos solicitados!!');
                }
                else
                {
                    return view('Alumnos',compact('Alumnos'));
                }
            }
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }

    public function Create(Request $request)
    {
        try
        {
            $Estatus_Alumno = new EstatusAlumno();
            $Estatus_Alumno = $Estatus_Alumno->CargaEstatusAlumno();
    
            $Generos_Alumno = new GeneroAlumno();
            $Generos_Alumno = $Generos_Alumno->GenerosAlumno();
    
            $Grupo = $request->Grupo;
    
            return view('AlumnoCreate',compact('Grupo','Estatus_Alumno','Generos_Alumno'));
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }

    public function Save(Request $request)
    {
        $this->validate($request,
        [
            'Nombre' => 'required|string|min:15|max:200|nullable',
            'Genero_Alumno' => 'required|not_in:Default',
            'Estatu_Alumno' => 'required|not_in:Default',
            'FNacimiento' => 'nullable|date|before:today'
        ]);
        
        try
        {
            $Alumno = new Alumno();
            $Alumno = $Alumno->AlumnoNuevo($request);
    
            if($Alumno!="Error")
            {
                return redirect()->route('AlumnosList')->with('alert_alumno','Alumno registrado correctamente');
            }
            else
            {
                return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
            }        
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }

    public function Edit($Matricula)
    {
        try
        {
            $Alumno = new Alumno();
            $Alumno = $Alumno->Alumno($Matricula);
            
            foreach($Alumno as $a)
            {
                $Alumno=$a;
            }
            
            $GradosEscolar = new GradoEscolarAlumno();
            $GradosEscolar = $GradosEscolar->CargaGradoEscolar();

            $Estatus_Alumno = new EstatusAlumno();
            $Estatus_Alumno = $Estatus_Alumno->CargaEstatusAlumno();

            $Generos_Alumno = new GeneroAlumno();
            $Generos_Alumno = $Generos_Alumno->GenerosAlumno();

            return view('AlumnoEdit',compact('Alumno','Matricula','GradosEscolar','Estatus_Alumno','Generos_Alumno'));
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }
    
    public function Update(Request $request, $Matricula)
    {
        $this->validate($request,
        [
            'Nombre' => 'required|string|min:15|max:200|nullable',
            'FNacimiento' => 'nullable|date|before:today'
        ]);

        try
        {
            $Alumno = new Alumno();
            $Alumno = $Alumno->ActualizaAlumno($Matricula,$request);
    
            if($Alumno!="Error")
            {
                return redirect()->route('AlumnosList')->with('alert_alumno','Alumno actualizado correctamente');
            }
            else
            {
                return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
            }        
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }

    Public function Delete($Matricula)
    {
        try
        {
            $Alumno = new Alumno();
            $Alumno = $Alumno->DelAlumno($Matricula);  
            
            if($Alumno!="Error")
            {
                return redirect()->route('AlumnosList')->with('alert_alumno','Alumno eliminado correctamente');
            }
            else
            {
                return redirect()->back()->with('alert_alumno','A ocurrido un error, intentelo nuevamente!!');
            }  
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }      
    }

    public function CreateAlum(Request $request)
    {
        try
        {
            $Estatus_Alumno = new EstatusAlumno();
            $Estatus_Alumno = $Estatus_Alumno->CargaEstatusAlumno();
    
            $Generos_Alumno = new GeneroAlumno();
            $Generos_Alumno = $Generos_Alumno->GenerosAlumno();
    
            $GradosEscolar = new GradoEscolarAlumno();
            $GradosEscolar = $GradosEscolar->CargaGradoEscolar();

            return view('AlumnoGroupCreate',compact('GradosEscolar','Estatus_Alumno','Generos_Alumno'));
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }

    public function SaveAlum(Request $request)
    {
        $this->validate($request,
        [
            'Nombre' => 'required|string|min:15|max:200|nullable',
            'Genero_Alumno' => 'required|not_in:Default',
            'Estatu_Alumno' => 'required|not_in:Default',
            'FNacimiento' => 'nullable|date|before:today'
        ]);
        
        try
        {
            $Alumno = new Alumno();
            $Alumno = $Alumno->AlumnoNuevoGrupo($request);
    
            if($Alumno!="Error")
            {
                return redirect()->route('/')->with('alert_alumno','Alumno registrado correctamente');
            }
            else
            {
                return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
            }        
        }
        catch(Exception $e)
        {
            Log::error('Hubo un error al entrar' . $e); 
            return redirect()->route('/')->with('alert_alumno','A ocurrido un Error, favor de intentarlo Nuevamente!!');
        }
    }
}
