@extends('Layout')

@section('content')
      <div class="container">
         <div class="row">
            <div class="col-sm-5 col-md-10 col-lg-12">
               <a href="{{url('/Alumno-Create/')}}" class="btn btn-danger">
               <i class="fa fa-plus"></i>
               Añadir nuevo Alumno
               </a>
            </div>
         </div>
         <br>
         <div class="row align-items-center">
            <div class="table table-secondary table-hover table-striped table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Genero</th>
                        <th>Grado Escolar</th>
                        <th>Estatus</th>
                        <th></th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($Alumnos as $Alumno)
                     <tr>
                        <th>{{$Alumno->Matricula}}</th>
                        <td>{{$Alumno->Nombre}}</td>
                        <td>{{Carbon\Carbon::parse($Alumno->FNacimiento)->format('d-m-Y')}}</td>
                        <td>{{$Alumno->Genero}}</td>
                        <td>{{$Alumno->GradoEscolar}}</td>
                        <td>{{$Alumno->Estatus_Alumno}}</td>
                        <td>
                           <a href="{{url('/Alumno-Edit/'.$Alumno->Matricula)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                        </td>
                        <td>
                           <a href="" data-target="#modal-delete-{{$Alumno->Matricula}}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i>   Eliminar</a>
                        </td>
                     </tr>
                     @include('modaleliminar')
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <!-- Optional JavaScript -->
      <script>
    var exist = '{{Session::has('alert_alumno')}}';
    if(exist){
        alert('{{Session::get('alert_alumno')}}');
    }
    
  </script>
@endsection